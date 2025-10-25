import forms from "@tailwindcss/forms";

export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/wireui/wireui/src/**/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
    ],
    theme: {
        extend: {},
    },
    plugins: [forms],
};
