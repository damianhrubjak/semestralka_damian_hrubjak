const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    purge: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.vue",
    ],
    mode: "jit",
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: {
            transparent: "transparent",
            current: "currentColor",
            white: colors.white,
            black: colors.black,
            rose: colors.rose,
            pink: colors.pink,
            fuchsia: colors.fuchsia,
            purple: colors.purple,
            violet: colors.violet,
            indigo: colors.indigo,
            blue: colors.blue,
            sky: colors.sky,
            cyan: colors.cyan,
            teal: colors.teal,
            emerald: colors.emerald,
            green: colors.green,
            lime: colors.lime,
            yellow: colors.yellow,
            amber: colors.amber,
            orange: colors.orange,
            red: colors.red,
            "warm-gray": colors.warmGray,
            "true-gray": colors.trueGray,
            gray: colors.gray,
            "cool-gray": colors.coolGray,
            "blue-gray": colors.blueGray,
        },
        extend: {},
        screens: {
            xs: "475px",
            ...defaultTheme.screens,
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
