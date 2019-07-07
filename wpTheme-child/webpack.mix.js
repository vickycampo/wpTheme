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

mix.setPublicPath( './assets' );

// Compile assets
  mix.js( 'src/js/catNavBar.js', 'assets/js' )
	.js( 'src/js/child_ajax.js', 'assets/js' )
	.js( 'src/js/topNavBar.js', 'assets/js' )
	.js( 'src/js/wpChildTheme.js', 'assets/js' )

	.sass( 'src/css/body.scss', 'assets/css' )
	.sass( 'src/css/breadcrumbs.scss', 'assets/css' )
	.sass( 'src/css/child-style.scss', 'assets/css' )
	.sass( 'src/css/header.scss', 'assets/css' )
	.sass( 'src/css/subCat_nav.scss', 'assets/css' )
	.sass( 'src/css/top-nav.scss', 'assets/css' );

// Add versioning to assets in production environment
if ( mix.inProduction() ) {
	mix.version();
}
