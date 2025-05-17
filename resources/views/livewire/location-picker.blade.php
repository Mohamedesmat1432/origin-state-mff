<div>
    <div x-data="mapComponent(@entangle('coordinates'), @entangle('area'))" x-init="init()" class="w-full">
        <div class="mb-4" wire:ignore>
            <div id="map" style="height: 500px;"></div>
        </div>

        <div class="flex gap-4 mb-4">
            <input type="text" x-model="address" placeholder="العنوان" class="border p-2 w-full" />
            <button @click="geocodeAddress(address)" class="bg-blue-500 text-white px-4 py-2 rounded">
                بحث بالخريطة
            </button>
            <p> <span x-text="errorMessage"></span></p>
        </div>

        <div class="flex items-center gap-4 mb-4">
            <p><strong>المساحة:</strong> <span x-text="formattedArea"></span> م²</p>

            <input x-model="manualArea" @input="updateCoordinatesFromArea" type="number"
                placeholder="أدخل المساحة يدويًا بالمتر" class="border p-2" />

            <button @click="clearPolygon" class="bg-red-500 text-white px-3 py-1 rounded">مسح الرسم</button>
            <button @click="toggleDrawing" class="bg-gray-700 text-white px-3 py-1 rounded">
                <span x-text="isDrawing ? 'إيقاف الرسم' : 'بدء الرسم'"></span>
            </button>
        </div>

        <div class="mt-4">
            <h3 class="font-bold mb-2">الإحداثيات:</h3>
            <template x-for="(point, index) in polygonPoints" :key="index">
                <div><span x-text="'نقطة ' + (index + 1) + ': ' + point[0] + ', ' + point[1]"></span></div>
            </template>
            <button @click="navigator.clipboard.writeText(JSON.stringify(polygonPoints))"
                class="mt-2 bg-green-500 text-white px-3 py-1 rounded">
                نسخ الإحداثيات
            </button>
        </div>

        <button @click="$wire.save()" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">حفظ الأرض</button>

        @if (session()->has('message'))
        <div class="mt-2 text-green-600">{{ session('message') }}</div>
        @endif
    </div>

    {{-- @push('scripts')
    <script>
        
    </script>
    @endpush --}}
</div>
