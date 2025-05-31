import L from 'leaflet';
import * as turf from '@turf/turf';
import proj4 from 'proj4';

proj4.defs('EPSG:32636', '+proj=utm +zone=36 +datum=WGS84 +units=m +no_defs');

window.mapComponent = (gov, city, entangledCoordinates, entangledArea) => ({
    governorate: gov ?? 'البحر الأحمر',
    city: city ?? 'الغردقة',
    coordsInput: '',
    coordinates: entangledCoordinates,
    total_area_coords: entangledArea,
    polygonsPoints: [], // Array of polygons
    drawnPolygons: [],
    map: null,
    errorMessage: '',

    get formattedArea() {
        return (+this.total_area_coords || 0).toFixed(2);
    },

    init() {
        const el = this.$refs.map;
        if (!el || el._leaflet_id) return;

        this.map = L.map(el).setView([26.8, 30.8], 6);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap',
        }).addTo(this.map);

        if (Array.isArray(this.coordinates) && this.coordinates.length) {
            this.coordsInput = JSON.stringify(this.coordinates);
            this.run();
        }

        this.$nextTick(() => this.map.invalidateSize());
    },

    async run() {
        this.errorMessage = '';
        this.total_area_coords = 0;
        this.polygonsPoints = [];

        try {
            if (this.governorate && this.city) {
                const q = `${this.city}, ${this.governorate}, Egypt`;
                const d = await fetch(`/proxy/nominatim?q=${encodeURIComponent(q)}`).then(r => r.json());
                if (d.length) this.map.setView([+d[0].lat, +d[0].lon], 15);
            }

            if (!this.coordsInput.trim()) return;

            const input = JSON.parse(this.coordsInput);

            const polygonList = Array.isArray(input[0][0])
                ? input // Multiple polygons
                : [input]; // Single polygon wrapped in an array

            this.polygonsPoints = polygonList.map(poly =>
                poly.map(([x, y]) => {
                    const [lon, lat] = proj4('EPSG:32636', 'EPSG:4326', [x, y]);
                    return [lat, lon];
                })
            );

            this.drawPolygons();

            const allBounds = this.drawnPolygons.map(p => p.getBounds());
            if (allBounds.length) {
                const bounds = allBounds.reduce((acc, b) => acc.extend(b), allBounds[0]);
                this.map.fitBounds(bounds);
            }

        } catch (e) {
            this.errorMessage = 'خطأ في الإحداثيات/العنوان';
        }
    },

    drawPolygons() {
        // Remove old polygons
        this.drawnPolygons.forEach(p => this.map.removeLayer(p));
        this.drawnPolygons = [];
        this.total_area_coords = 0;

        const updatedCoordinates = [];

        for (const pts of this.polygonsPoints) {
            const closedPts = [...pts];
            if (closedPts.length && closedPts[0] + '' !== closedPts.at(-1) + '') {
                closedPts.push(closedPts[0]);
            }

            const polygon = L.polygon(closedPts, {
                color: 'red',
                dashArray: '4 6',
            }).addTo(this.map);

            this.drawnPolygons.push(polygon);

            const turfPoly = turf.polygon([[...closedPts.map(([lat, lon]) => [lon, lat])]]);
            this.total_area_coords += turf.area(turfPoly);

            updatedCoordinates.push(
                closedPts.map(([lat, lon]) => proj4('EPSG:4326', 'EPSG:32636', [lon, lat]))
            );
        }

        this.coordinates = updatedCoordinates;
        this.coordsInput = JSON.stringify(updatedCoordinates); // Sync with textarea
    },


});
