/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                manrope: ["Manrope", "ui-sans-serif", "system-ui"],
            },

            colors: {
                primary: "#1a56db",
                hover: "#1e429f",
                ring_light: "#a4cafe",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
