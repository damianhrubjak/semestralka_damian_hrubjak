const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/tailwind.css", "public/css/app.css", [
        require("tailwindcss"),
    ])
    .sass("resources/sass/app.scss", "public/css")
    // ADMIN
    .js("resources/js/admin/admin-app.js", "public/js")
    .postCss(
        "resources/css/admin/tailwind-admin.css",
        "public/css/admin-app.css",
        [require("tailwindcss")]
    )
    .sass("resources/sass/admin/admin-app.scss", "public/css")
    .disableSuccessNotifications();
