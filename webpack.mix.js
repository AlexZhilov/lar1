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

mix
    .js('resources/js/app.js', 'public/js')

    // .styles([
    //     'resources/css/app.css',
    // ], 'public/css/app.css')
    //
    // .scripts([
    //     'resources/js/app.js',
    // ],'public/js/scripts.js')

    .sass('resources/sass/app.scss', 'public/css')

    .browserSync('http://127.0.0.1')

    .sourceMaps();

