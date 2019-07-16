/*
 * AWPS uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel.com/docs/5.6/mix
 */

let mix = require( 'laravel-mix' );

// BrowserSync and LiveReload on `npm run watch` command
// Update the `proxy` and the location of your SSL Certificates if you're developing over HTTPS
// mix.browserSync({
// 	proxy: 'https://your-local-domain',
// 	https: {
// 		key: '/your/certificates/location/your-local-domain.key',
// 		cert: '/your/certificates/location/your-local-domain.crt'
// 	},
// 	files: [
// 		'**/*.php',
// 		'assets/dist/css/**/*.css',
// 		'assets/dist/js/**/*.js'
// 	],
// 	injectChanges: true,
// 	open: false
// });

// Autloading jQuery to make it accessible to all the packages, because, you know, reasons
// You can comment this line if you don't need jQuery
mix.autoload({
	jquery: ['$', 'window.jQuery', 'jQuery'],
});

mix.setPublicPath( 'wpTheme-child/assets/dist' );

// Compile assets
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
