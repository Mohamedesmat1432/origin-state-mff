import L from 'leaflet';
import * as turf from '@turf/turf';
import proj4 from 'proj4';

proj4.defs('EPSG:32636', '+proj=utm +zone=36 +datum=WGS84 +units=m +no_defs');

window.mapComponent = (gov, city, entangledCoordinates, entangledArea) => ({
    governorate: gov ?? 'البحر الأحمر',
    city: city ?? 'الغردقة',
    coordsInput: '',
    coordinates: entangledCoordinates,       // Livewire bound
    total_area_coords: entangledArea,        // Livewire bound
    polygonPoints: [],
    drawnPolygon: null,
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

        try {
            if (this.governorate && this.city) {
                const q = `${this.city}, ${this.governorate}, Egypt`;
                const d = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(q)}`).then(r => r.json());
                if (d.length) this.map.setView([+d[0].lat, +d[0].lon], 15);
            }

            if (!this.coordsInput.trim()) return;

            const list = this.coordsInput.trim().startsWith('[')
                ? JSON.parse(this.coordsInput)
                : this.coordsInput
                    .split(/\n+/)
                    .map(l => l.trim())
                    .filter(Boolean)
                    .map(l => l.split(/[ ,]+/).map(Number));

            if (list.length < 3) throw new Error('few points');

            this.polygonPoints = list.map(([x, y]) => {
                const [lon, lat] = proj4('EPSG:32636', 'EPSG:4326', [x, y]);
                return [lat, lon];
            });

            this.drawPolygon();
            this.map.fitBounds(this.drawnPolygon.getBounds());
        } catch (e) {
            this.errorMessage = 'خطأ في الإحداثيات/العنوان';
        }
    },

    drawPolygon() {
        if (this.drawnPolygon) this.map.removeLayer(this.drawnPolygon);

        const pts = [...this.polygonPoints];
        if (pts.length > 0 && pts[0] + '' !== pts.at(-1) + '') pts.push(pts[0]);

        this.drawnPolygon = L.polygon(pts, {
            color: 'red',
            dashArray: '4 6',
        }).addTo(this.map);

        const turfPoly = turf.polygon([[...pts.map(([lat, lon]) => [lon, lat])]]);
        this.total_area_coords = turf.area(turfPoly);

        // Convert back to EPSG:32636 and update entangled Livewire value
        this.coordinates = this.polygonPoints.map(([lat, lon]) =>
            proj4('EPSG:4326', 'EPSG:32636', [lon, lat])
        );

        this.coordsInput = JSON.stringify(this.coordinates); // Sync textarea
    },
});
