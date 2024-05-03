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

=============ORIGINAL CODE=============
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

    const mix = require('laravel-mix');
=======================================
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .styles([
        'node_modules/admin-lte/dist/css/adminlte.css',
        'node_modules/select2/dist/css/select2.css',

        //'node_modules/fullcalendar-scheduler/dist/scheduler.css',
        // Adicione outros arquivos CSS de bibliotecas aqui
    ], 'public/css/vendor.css')    
    
    .scripts([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/admin-lte/dist/js/adminlte.js',
        'node_modules/select2/dist/js/select2.js',
        //'node_modules/fullcalendar/dist/fullcalendar.js',
        // Adicione outros arquivos JavaScript de bibliotecas aqui
    ], 'public/js/vendor.js')


    .scripts([
        //'node_modules/@babel/core/dist/core.js',
        //'node_modules/@babel/preset-env/dist/env.js',
        //'node_modules/@babel/preset-react/dist/react.js',
        //'node_modules/@popperjs/core/dist/core.js',
        //'node_modules/autoprefixer/dist/autoprefixer.js',
        'node_modules/axios/dist/axios.js',
        //'node_modules/bootstrap/dist/bootstrap.js',
        //'node_modules/choices.js/dist/choices.js',
        //'node_modules/fullcalendar-scheduler/dist/scheduler.js',
        //'node_modules/fullcalendar/dist/fullcalendar.js',
        //'node_modules/lodash/dist/lodash.js',
        'node_modules/popper.js/dist/popper.js',
        //'node_modules/postcss/dist/postcss.js',
        //'node_modules/resolve-url-loader/dist/resolve-url-loader.js',
        //'node_modules/sass-loader/dist/sass-loader.js',
        //'node_modules/sass/dist/sass.js',
        //'node_modules/trumbowyg/dist/trumbowyg.min.js',
        //'node_modules/vue-template-compiler/dist/vue-template-compiler.js',
        //'node_modules/vue/dist/vue.js',
        // Adicione outros arquivos JavaScript de bibliotecas aqui
    ], 'public/js/vendor.js');
 