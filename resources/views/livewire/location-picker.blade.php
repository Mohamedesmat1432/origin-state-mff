<div class="w-full p-4" x-data="mapComponent()" x-init="init(); Livewire.hook('message.processed', () => init())">

    <div class="flex justify-between gap-x-2">
        <input x-model="governorate" placeholder="المحافظة" class="border p-2 rounded w-full mb-2">

        <input x-model="city" placeholder="المدينة" class="border p-2 rounded w-full mb-2">
    </div>

    <textarea x-model="coordsInput" rows="4" placeholder="3013561.441,3013215.575"
        class="border p-2 rounded w-full mb-2"></textarea>

    <button @click="run" class="bg-blue-600 text-white w-full py-2 rounded mb-2">
        تنفيذ
    </button>

    <div id="map" x-ref="map" class="h-96 rounded mb-2 w-full"></div>

    المساحة: <span x-text="formattedArea"></span> م²
    <template x-if="errorMessage">
        <div class="text-red-600" x-text="errorMessage"></div>
    </template>
</div>