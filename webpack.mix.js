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
    .sass('resources/sass/app.scss', 'public/css');

mix.styles('resources/css/teacher.css', 'public/css/myCustomTheme.css').version();
mix.styles('resources/css/membership.css', 'public/css/formsTheme.css').version();
mix.styles('node_modules/bootstrap/dist/css/bootstrap.css', 'public/css/theme.css').version();
mix.styles('resources/css/classhome.css', 'public/css/mesThemes.css');
mix.js(['node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/bootstrap/js/src/modal.js',
    'node_modules/jquery/dist/jquery.min.js'
], 'public/js/theme.js').version();