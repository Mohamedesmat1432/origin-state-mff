<button {{ $attributes->merge(['type' => 'button', 'class' => 'whitespace-nowrap inline-flex items-center justify-center p-2 bg-red-500 border border-transparent rounded-md font-semibold text-sm text-white uppercase hover:bg-red-600 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
