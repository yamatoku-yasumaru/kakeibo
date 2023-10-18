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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            color:{
                    white: {
                    300: "#F8F8F8",
                    500: "#fff",
                    },
                    blue: {
                    300: "#93c5fd",
                    400: "##60a5fa",
                    },
                     red: {
                    300: "#fca5a5",
                    },
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
    plugins: [require("@tailwindcss/typography"), require("daisyui")],
};
