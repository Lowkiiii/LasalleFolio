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
                fadeIn: "fadeInOut .5s ease-in-out",
            },

            keyframes: {
                fadeInOut: {
                    from: { opacity: 0 },
                    to: { opacity: 1 },
                    from: { opacity: 0 },
                },
            },
        },
    },
    plugins: [require("tw-elements/dist/plugin.cjs"), animations],
};
