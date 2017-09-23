let mix = require('laravel-mix');

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
mix.scripts([
    'public/assets/global/plugins/respond.min.js',
    'public/assets/global/plugins/excanvas.min.js',
    'public/assets/global/plugins/ie8.fix.min.js',
    'public/assets/global/plugins/jquery.min.js',
    'public/assets/global/plugins/bootstrap/js/bootstrap.min.js',
    'public/assets/global/plugins/toastr/toastr.min.js',
    'public/assets/global/scripts/app.min.js',
    'public/assets/layouts/layout/scripts/layout.min.js'
], 'public/js/app.js');

mix.styles([
    'public/assets/global/plugins/font-awesome/css/font-awesome.min.css',
    'public/assets/global/fonts/google-fonts.css',
    'public/assets/global/plugins/bootstrap/css/bootstrap.min.css',
    'public/assets/global/plugins/toastr/toastr.min.css',
    'public/assets/global/css/components.min.css',
    'public/assets/layouts/layout/css/layout.min.css',
    'public/assets/layouts/layout/css/themes/darkblue.min.css',
    'public/assets/layouts/layout/css/custom.min.css'
], 'public/css/app.css')
    .copy('public/assets/global/plugins/font-awesome/fonts', 'public/fonts');