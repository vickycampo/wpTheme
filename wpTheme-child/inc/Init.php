<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `config/custom/custom.php` to write your custom functions
 *
 * @package wpTheme
 */

namespace wptchild;

final class Init
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function get_services()
	{
		return [
			/* My Customizations */
			Api\ExtraCustomizer\AdvancedOptions::class,
			Api\ExtraCustomizer\Colors::class,
			Api\ExtraCustomizer\HeaderImage::class,
			Api\ExtraCustomizer\LayoutOptions::class,
			Api\ExtraCustomizer\NavigationBarOptions::class,

               Core\Menus::class,
               Core\SideBars::class,
               Core\BreadCrumbs::class,

               Custom\ChildAjax::class,

               Setup\EnqueueChild::class,
               Setup\Functions::class,
			Setup\Setup::class,


		];

	}

	/**
	 * Loop through the classes, initialize them, and call the register() method if it exists
	 * @return
	 */
	public static function register_services()
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register') ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  class $class 		class from the services array
	 * @return class instance 		new instance of the class
	 */
	private static function instantiate( $class )
	{
		return new $class();
	}

}
