const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/home.js', 'public/js')
    .js('resources/js/dashboard.js', 'public/js')

    .js('resources/js/site/address/index.js', 'public/js/site/address')
    .js('resources/js/site/address/modal.js', 'public/js/site/address')
    .js('resources/js/site/address/data-row.js', 'public/js/site/address')
    .js('resources/js/site/address/amphur-edit.js', 'public/js/site/address')

    .js('resources/js/site/bills/insert/index.js', 'public/js/site/bills/insert')
    .js('resources/js/site/bills/edit/index.js', 'public/js/site/bills/edit')

    .js('resources/js/site/reports/bills/index.js', 'public/js/site/reports/bills')

    .sass('resources/sass/app.scss', 'public/css');
