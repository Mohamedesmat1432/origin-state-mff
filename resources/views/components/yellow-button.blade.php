<button {{ $attributes->merge(['type' => 'button', 'class' => 'whitespace-nowrap inline-flex items-center p-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-yellow-700 focus:bg-yellow-500 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
