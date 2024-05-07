/** @type {import('tailwindcss').Config} */
import animations from "@midudev/tailwind-animations";

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                InputGray: "#D9D9D9",
                TextGray: "444444",
            },
            animation: {
                fadeout: "fadeInOut 1s forwards",
            },

            keyframes: {
                fadeInOut: {
                    from: { opacity: 1 },
                    to: { opacity: 0 },
                },
            },
        },
    },
    plugins: [require("tw-elements/dist/plugin.cjs"), animations],
};
