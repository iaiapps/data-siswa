import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    css: {
        preprocessorOptions: {
            scss: {
                api: "modern", // or "modern"
            },
        },
    },
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
