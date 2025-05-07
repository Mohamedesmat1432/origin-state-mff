<div x-data="{
    centerLat: @entangle('centerLat'),
    centerLng: @entangle('centerLng'),
    latitude: @entangle('latitude'),
    longitude: @entangle('longitude'),
    map: null,
    marker: null,
    polygon: null,
    points: 36,
    useAutoRadius: true,
    customRadius: 100,

    initMap() {
        this.map = L.map('map').setView([this.centerLat, this.centerLng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(this.map);

        this.marker = L.marker([this.latitude, this.longitude], { draggable: true }).addTo(this.map);

        this.drawPolygon();

        this.marker.on('dragend', (e) => {
            const pos = e.target.getLatLng();
            this.latitude = pos.lat;
            this.longitude = pos.lng;
            this.drawPolygon();
        });

        this.map.on('click', (e) => {
            const { lat, lng } = e.latlng;
            this.marker.setLatLng([lat, lng]);
            this.latitude = lat;
            this.longitude = lng;
            this.drawPolygon();
        });

        this.map.invalidateSize();
    },

    drawPolygon() {
        const radius = this.useAutoRadius ?
            this.calculateDistance(this.centerLat, this.centerLng, this.latitude, this.longitude) :
            this.customRadius;

        const polygonPoints = this.generateCirclePolygon(this.centerLat, this.centerLng, radius, this.points);

        if (this.polygon) this.map.removeLayer(this.polygon);
        this.polygon = L.polygon(polygonPoints).addTo(this.map);
    },

    generateCirclePolygon(lat, lng, radius, pointsCount) {
        const earthRadius = 6371000;
        const step = 360 / pointsCount;
        const coords = [];

        for (let i = 0; i < pointsCount; i++) {
            const angle = step * i;
            const rad = angle * Math.PI / 180;
            const dx = radius * Math.cos(rad);
            const dy = radius * Math.sin(rad);

            const dLat = (dy / earthRadius) * (180 / Math.PI);
            const dLng = (dx / (earthRadius * Math.cos(lat * Math.PI / 180))) * (180 / Math.PI);

            coords.push([lat + dLat, lng + dLng]);
        }

        coords.push(coords[0]); // close polygon
        return coords;
    },

    calculateDistance(lat1, lng1, lat2, lng2) {
        return L.latLng(lat1, lng1).distanceTo(L.latLng(lat2, lng2)).toFixed(2);
    },

    calculateArea() {
        if (!this.polygon) return 0;
        const coords = this.polygon.getLatLngs()[0].map(p => [p.lng, p.lat]);
        if (coords[0] !== coords[coords.length - 1]) coords.push(coords[0]);
        const poly = turf.polygon([coords]);
        return turf.area(poly).toFixed(2);
    }
}" x-init="initMap">
    <div id="map" class="w-full" style="height: 400px;"></div>

    <div class="mt-4 grid grid-cols-2 gap-4">
        <div>
            <label>Latitude:
                <input type="text" x-model="latitude" readonly class="border p-1 w-full">
            </label>
            <label>Longitude:
                <input type="text" x-model="longitude" readonly class="border p-1 w-full">
            </label>
        </div>
        <div>
            <label>Points (circle precision):
                <input type="number" x-model.number="points" min="3" class="border p-1 w-full"
                    @change="drawPolygon()">
            </label>
            <label>Use Auto Radius:
                <input type="checkbox" x-model="useAutoRadius" @change="drawPolygon()">
            </label>
            <template x-if="!useAutoRadius">
                <label>Custom Radius (m):
                    <input type="number" x-model.number="customRadius" min="1" class="border p-1 w-full"
                        @input="drawPolygon()">
                </label>
            </template>
        </div>
    </div>

    <div class="mt-4">
        <p><strong>Distance:</strong> <span
                x-text="calculateDistance(centerLat, centerLng, latitude, longitude)"></span> m</p>
        <p><strong>Area:</strong> <span x-text="calculateArea()"></span> m²</p>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@endpush

@push('scripts')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/@turf/turf/turf.min.js"></script>
@endpush
