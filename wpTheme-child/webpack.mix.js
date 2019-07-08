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

mix.setPublicPath( './assets/dist' );

// Compile assets
  mix.js( 'assets/src/scripts/app.js', 'assets/dist/js' )
     .js( 'assets/src/scripts/catNavBar.js', 'assets/dist/js' )
     .js( 'assets/src/scripts/child_ajax.js', 'assets/dist/js' )
     .js( 'assets/src/scripts/topNavBar.js', 'assets/dist/js' )
     .js( 'assets/src/scripts/wpChildTheme.js', 'assets/dist/js' )


     .sass( 'assets/src/sass/body.scss', 'assets/dist/css' )
     .sass( 'assets/src/sass/breadcrumbs.scss', 'assets/dist/css' )
     .sass( 'assets/src/sass/child-style.scss', 'assets/dist/css' )
     .sass( 'assets/src/sass/custom.scss', 'assets/dist/css' )
     .sass( 'assets/src/sass/style.scss', 'assets/dist/css' )
     .sass( 'assets/src/sass/header.scss', 'assets/dist/css' )
     .sass( 'assets/src/sass/subCat_nav.scss', 'assets/dist/css' )
     .sass( 'assets/src/sass/top-nav.scss', 'assets/dist/css' )

// Add versioning to assets in production environment
if ( mix.inProduction() ) {
	mix.version();
}
