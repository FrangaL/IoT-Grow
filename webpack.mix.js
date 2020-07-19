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

 mix.options({
  terser: {
    extractComments: false,
  }
 })
 mix.disableNotifications()
 mix.js('resources/js/app.js', 'public/js')
 mix.js('resources/js/ajaxbtn.js', 'public/js')
 mix.js('resources/js/timepicki.js', 'public/js')
 mix.js('resources/js/clock.js', 'public/js')
 mix.scripts([
         'resources/js/main.js',
         'resources/js/custom.js',
         ], 'public/js/all.js')
         .sass('resources/sass/app.scss', 'public/css')
         .styles([
         'resources/css/main.css',
         'resources/css/custom.css'],
         'public/css/all.css'),
 mix.styles([
         'resources/css/timepicki.css'],
         'public/css/timepicki.css'),
 mix.styles([
         'resources/css/clock.css'],
         'public/css/clock.css');
