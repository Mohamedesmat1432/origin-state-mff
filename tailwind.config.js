import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    
    ],
    safelist: [
        'bg-cyan-600', 'hover:bg-cyan-700',
        'bg-indigo-600', 'hover:bg-indigo-700',
        'bg-purple-600', 'hover:bg-purple-700',
        'bg-teal-600', 'hover:bg-teal-700',
        'bg-amber-600', 'hover:bg-amber-700',
        'bg-blue-600', 'hover:bg-blue-700',
        'bg-rose-600', 'hover:bg-rose-700',
        'bg-emerald-600', 'hover:bg-emerald-700',
        'bg-orange-600', 'hover:bg-orange-700',
        'bg-lime-600', 'hover:bg-lime-700',
    ],    
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
