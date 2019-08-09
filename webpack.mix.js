let mix = require( 'laravel-mix' );

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
 mix.autoload({
 	jquery: ['$', 'window.jQuery', 'jQuery'],
 });

 /*  Folder location:
      - Laptop:
          cd C:\xampp\htdocs\wordpress\wp-content\themes\wpTheme
     Run
      - npm run dev
*/
var srcRootFolder =  'wpTheme-child/assets/src/scripts/';
var distRootFolder = 'wpTheme-child/assets/dist/js';

var srcRootFolderSASS = 'wpTheme-child/assets/src/sass/style.scss';
var distRootFolderSASS = 'wpTheme-child/assets/dist/css';
 mix.js( srcRootFolder + 'app.js', distRootFolder )
    .js( srcRootFolder + 'bootstrap.js', distRootFolder )
    .js( srcRootFolder + 'catNavBar.js', distRootFolder )
    .js( srcRootFolder + 'child_ajax.js', distRootFolder )
    .js( srcRootFolder + 'topNavBar.js', distRootFolder )
    .js( srcRootFolder + 'wpChildTheme.js', distRootFolder )
    .js( srcRootFolder + 'popper.js', distRootFolder )
    .sass( srcRootFolderSASS, distRootFolderSASS )

 // Add versioning to assets in production environment
 if ( mix.inProduction() ) {
    mix.version();
 }
