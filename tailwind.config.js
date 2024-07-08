/** @type {import('tailwindcss').Config} */
const plugin = require("tailwindcss/plugin");
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require("daisyui"),
        require("tailwind-scrollbar-hide"),
        require("@tailwindcss/forms")({
            strategy: "class", // only generate classes
        }),
        plugin(function ({ addUtilities }) {
            addUtilities({
                ".arrow-hide": {
                    "&::-webkit-inner-spin-button": {
                        "-webkit-appearance": "none",
                        margin: 0,
                    },
                    "&::-webkit-outer-spin-button": {
                        "-webkit-appearance": "none",
                        margin: 0,
                    },
                    "-moz-appearance": "textfield !important",
                },
            });
        }),
    ],
    daisyui: {
        themes: ["cupcake"],
    },
};
