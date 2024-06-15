import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        //added below
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {

        screens:{
            'sm': {'max': '639px'},

            'md': {'max': '767px'},

            'lg': {'max': '1023px'},

            'xl': {'max': '1279px'},

            'lgMin' : {'min' : '1024px'},

        },

        extend: {
            colors: {
                'gray-background' : '#f7f8fc',
                'half-transparent': 'rgba(0,0,0,0.5)',
                'dark-bg' : '#2D3141',
                'sky2' : '#54b3d6',
                'footer' : '#e4e4e4',
            },

            maxWidth: {
                main: '62.5rem'
            },
            
            spacing: {
                70: '17.5rem',
                55: '17rem',
                175: '43.75rem',
            },
            
            fontSize: {
                xxs: ['0.625rem', { lineHeight: '1rem' }],
            },
            
            boxShadow: {
                card: '4px 4px 15px 0 rgba(36, 37, 38, 0.08)',
                dialog: '3px 4px 15px 0 rgba(36, 37, 38, 0.22)',
            },

            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },

            screens:{
                'smMin': '640px',

                'mdMin': '768px',

                'lgMin': '1024px',

                'xlMin': '1280px'
            },
            borderRadius: {
                '2xl': '1rem'
            },

            borderWidth: {
                '3' : '3px'
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
    ],
};
