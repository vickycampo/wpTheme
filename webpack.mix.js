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

 mix.js( 'wpTheme-child/assets/src/scripts/app.js', 'assets/dist/js' )
    .js( 'wpTheme-child/assets/src/scripts/bootstrap.js', 'assets/dist/js' )
    .js( 'wpTheme-child/assets/src/scripts/catNavBar.js', 'assets/dist/js' )
    .js( 'wpTheme-child//src/scripts/child_ajax.js', 'assets/dist/js' )
    .js( 'wpTheme-child/assets/src/scripts/topNavBar.js', 'assets/dist/js' )
    .js( 'wpTheme-child/assets/src/scripts/wpChildTheme.js', 'assets/dist/js' )


    .sass( 'wpTheme-child/assets/src/sass/body.scss', 'assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/bootstrap.scss', 'assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/breadcrumbs.scss', 'assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/child-style.scss', 'assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/style.scss', 'assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/header.scss', 'assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/subCat_nav.scss', 'assets/dist/css' )
    .sass( 'wpTheme-child/assets/src/sass/top-nav.scss', 'assets/dist/css' )

 // Add versioning to assets in production environment
 if ( mix.inProduction() ) {
    mix.version();
 }
