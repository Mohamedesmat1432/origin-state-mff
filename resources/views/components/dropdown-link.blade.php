@props(['active'])

@php
$classes = $active ?? false
? 'md:rounded gap-x-2 text-lg font-semibold inline-flex w-full p-2 text-' . __('site.left') . '
text-sm leading-5 border-l-2 border-blue-400 bg-blue-100 focus:outline-none focus:bg-blue-100 transition duration-150
ease-in-out'

: 'md:rounded gap-x-2 text-lg inline-flex w-full p-2 text-' . __('site.left'). ' text-sm leading-5 text-gray-700 hover:bg-blue-50
focus:outline-none focus:bg-blue-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>