const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        fontFamily: {
            primary: "Playfair Display",
            body: "work Sans",
        },
        container: {
            padding: {
                DEFAULT: "1rem",
                lg: "3rem",
            },
        },
        extend: {
            colors: {
                "light-primary": "#F8EDE3",
                "light-secondary": "#DFD3C3",
                "light-tail-100": "#D0B8A8",
                "light-tail-500": "#7D6E83",
                "dark-primary": "#2C3639",
                "dark-secondary": "#3F4E4F",
                "dark-navy-100": "#A27B5C",
                "dark-navy-500": "#DCD7C9",
                accent: {
                    DEFAULT: "#ac6b34",
                    hover: "#925a2b",
                },
                paragraph: "#878e99",
                blue: colors.blue,
                indigo: colors.indigo,
                green: colors.green,
                red: colors.red,
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
