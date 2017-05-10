const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copy('node_modules/sweetalert/dist/sweetalert.css', 'resources/assets/sass/sweetalert.scss')
   .sass('resources/assets/sass/sweetalert.scss', 'public/css')
   .js([
        'node_modules/sweetalert/dist/sweetalert.min.js'
    ], 'public/js/app.js');
