const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            keyframes: {
                'fade-in-down': {
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(-20px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)'
                    },
                }
            },
            animation: {
                'fade-in-down': 'fade-in-down 1s ease-out'
            },
            fontFamily: {
                roboto: ['Roboto', 'sans-serif'],
                righteous: ['Righteous', 'sans-serif'],
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                fold: ['Foldit', 'sans-serif']
            }
        },
    },

    plugins: [require('@tailwindcss/forms'),  require('@tailwindcss/line-clamp'), require('@tailwindcss/typography')],
    variants: {
        animation: ["motion-safe"]
    }
};
