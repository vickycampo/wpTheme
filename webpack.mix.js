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

 mix.js( 'wpTheme-child/assets/src/scripts/app.js', 'wpTheme-child/assets/dist/js' )
    .js( 'wpTheme-child/assets/src/scripts/bootstrap.js', 'wpTheme-child/assets/dist/js' )
    .js( 'wpTheme-child/assets/src/scripts/catNavBar.js', 'wpTheme-child/assets/dist/js' )
    .js( 'wpTheme-child/assets/src/scripts/child_ajax.js', 'wpTheme-child/assets/dist/js' )
    .js( 'wpTheme-child/assets/src/scripts/topNavBar.js', 'wpTheme-child/assets/dist/js' )
    .js( 'wpTheme-child/assets/src/scripts/wpChildTheme.js', 'wpTheme-child/assets/dist/js' )


    .sass( 'wpTheme-child/assets/src/sass/body.scss', 'wpTheme-child/assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/bootstrap.scss', 'wpTheme-child/assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/breadcrumbs.scss', 'wpTheme-child/assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/child-style.scss', 'wpTheme-child/assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/style.scss', 'wpTheme-child/assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/header.scss', 'wpTheme-child/assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/subCat_nav.scss', 'wpTheme-child/assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/top-nav.scss', 'wpTheme-child/assets/dist/css' )

 // Add versioning to assets in production environment
 if ( mix.inProduction() ) {
    mix.version();
 }
