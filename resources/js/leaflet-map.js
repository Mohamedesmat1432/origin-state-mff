import L from 'leaflet';
import * as turf from '@turf/turf';
window.L = L;
window.turf = turf;

window.mapComponent = (coordinates, area) => {
    let mapInstance = null;

    return {
        coordinates,
        area,
        manualArea: null,
        polygonPoints: [],
        drawnPolygon: null,
        isDrawing: true,
        map: null,
        address: '',
        errorMessage: '', // إضافة رسالة الخطأ

        get formattedArea() {
            return parseFloat(this.area || 0).toFixed(2);
        },

        init() {
            // Initialize map only once
            if (mapInstance) mapInstance.remove();

            this.map = mapInstance = L.map('map').setView([30.7167, 31.2572], 16);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(this.map);

            this.map.on('click', (e) => {
                if (!this.isDrawing) return;

                const lat = +e.latlng.lat.toFixed(6);
                const lng = +e.latlng.lng.toFixed(6);
                this.polygonPoints.push([lat, lng]);
                this.updatePolygon();
            });
        },

        async geocodeAddress(data) {
            const address = `${data}, Egypt`;
            const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`;

            try {
                this.errorMessage = '';
                const response = await fetch(url);
                const data = await response.json();

                if (data.length > 0) {
                    const lat = parseFloat(data[0].lat);
                    const lon = parseFloat(data[0].lon);
                    this.map.setView([lat, lon], 17);
                } else {
                    this.errorMessage = "لم يتم العثور على العنوان."; // عرض رسالة الخطأ
                }
            } catch (error) {
                this.errorMessage = "حدث خطأ أثناء الاتصال بالخريطة."; // معالجة الخطأ
            }
        },

        updatePolygon() {
            if (this.polygonPoints.length < 3) return;

            if (this.drawnPolygon) {
                this.map.removeLayer(this.drawnPolygon);
            }

            const closedPoints = [...this.polygonPoints];
            if (closedPoints[0][0] !== closedPoints.at(-1)[0] || closedPoints[0][1] !== closedPoints.at(-1)[1]) {
                closedPoints.push(closedPoints[0]);
            }

            this.drawnPolygon = L.polygon(closedPoints).addTo(this.map);
            this.coordinates = closedPoints;

            const turfPoly = turf.polygon([[...closedPoints.map(p => [p[1], p[0]])]]);
            this.area = turf.area(turfPoly);
        },

        clearPolygon() {
            this.polygonPoints = [];
            if (this.drawnPolygon) {
                this.map.removeLayer(this.drawnPolygon);
                this.drawnPolygon = null;
            }
            this.coordinates = [];
            this.area = 0;
        },

        toggleDrawing() {
            this.isDrawing = !this.isDrawing;
        },

        updateCoordinatesFromArea() {
            if (this.manualArea && this.manualArea > 0) {
                const sideLength = Math.sqrt(this.manualArea);
                const sideLengthInDegrees = 0.00001 * sideLength;

                const center = this.map.getCenter();
                const latLngs = this.generateSquareCoordinates(center, sideLengthInDegrees);

                this.polygonPoints = latLngs;
                this.updatePolygon();
            }
        },

        generateSquareCoordinates(center, sideLength) {
            const points = [];
            for (let i = 0; i < 4; i++) {
                const angle = (i * 90) * (Math.PI / 180);
                points.push(this.getPointFromCenter(center, sideLength, angle));
            }
            return points;
        },

        getPointFromCenter(center, distance, angle) {
            const newLat = center.lat + distance * Math.cos(angle);
            const newLng = center.lng + distance * Math.sin(angle);
            return [newLat, newLng];
        }
    };
}
