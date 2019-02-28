<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		THEME OPTIONS - CHOICES FUNCTIONS
	===================================
*
* All the functions that are used to validate the information in the theme_options.php
*/
?>
<?php
/*
	==================================
	    CHOICES - TRUE / FALSE
	==================================
*
* Generic yes/no function used for true/false options
*/
?>
<?php

if (!function_exists('wpTheme_true_false'))
{
     function wpTheme_true_false()
     {
          $true_false = array(
               true => __('Yes','wpTheme'),
               false => __('No','wpTheme')
          );
          return $true_false;
     }
}
?>
<?php
/*
	==============================
		CHOICES - SHOW EXCERPTS
	==============================
*
* Validate SHOW EXCERPTS options
*/
if (!function_exists('wpTheme_show_excerpts'))
{
    function wpTheme_show_excerpts()
    {
        $show_excerpts = array(
            true => __('Show Post Excerpts','wpTheme'),
            false => __('Show Full Posts','wpTheme')
        );
        return $show_excerpts;
    }
}

?>
<?php
/*
	==============================
		CHOICES - FONTS
	==============================
*
* Validate FONTS options
*/
if (!function_exists('wpTheme_fonts'))
{
     function wpTheme_fonts()
     {
          $fonts = array(
               'PT Serif' => 'PT Serif',
               'Inconsolata' => 'Inconsolata',
               'Droid Sans' => 'Droid Sans',
               'Ubuntu' => 'Ubuntu',
               'Lato' => 'Lato',
               'Noto Serif' => 'Noto Serif',
               'Open Sans' => 'Open Sans',
          );
          return $fonts;
     }
}

?>
<?php
/*
	==============================
		CHOICES - FONTS SUBSET
	==============================
*
* Validate FONTS SUBSET options
*/
if ( !function_exists( 'wpTheme_font_subset' ) )
{
     function wpTheme_font_subset()
     {
          $font_subsets = array(
               'latin' => __( 'Latin', 'wpTheme' ),
               'latin-ext' => __( 'Latin Extended', 'wpTheme' ),
               'cyrillic' => __( 'Cyrillic', 'wpTheme' ),
               'cyrillic-ext' => __( 'Cyrillic Extended', 'wpTheme' ),
               'greek' => __( 'Greek', 'wpTheme' ),
               'greek-ext' => __( 'Greek Extended', 'wpTheme' ),
               'vietnamese' => __( 'Vietnamese', 'wpTheme' )
          );
          return $font_subsets;
     }
}

?>
<?php
/*
	======================================
		CHOICES - CUSTOM FIELDS
	======================================
*
* Validate CUSTOM FIELDS options
*/
if ( !function_exists( 'wpTheme_skins' ) )
{
     function wpTheme_skins()
     {
          $skins = array(
               ' '            => __( '', 'wpTheme' ),
               'cerulean'     => __( 'Cerulean', 'wpTheme' ),
               'cosmo'        => __( 'Cosmo', 'wpTheme' ),
               'cyborg'       => __( 'Cyborg', 'wpTheme' ),
               'darkly'       => __( 'Darkly', 'wpTheme' ),
               'flatly'       => __( 'Flatly', 'wpTheme' ),
               'journal'      => __( 'Journal', 'wpTheme' ),
               'litera'       => __( 'Litera', 'wpTheme' ),
               'lumen'        => __( 'Lumen', 'wpTheme' ),
               'lux'          => __( 'Lux', 'wpTheme' ),
               'materia'      => __( 'Materia', 'wpTheme' ),
               'minty'        => __( 'Minty', 'wpTheme' ),
               'pulse'        => __( 'Pulse', 'wpTheme' ),
               'sandstone'    => __( 'Sandstone', 'wpTheme' ),
               'simplex'      => __( 'Simplex', 'wpTheme' ),
               'sketchy'      => __( 'Sketchy', 'wpTheme' ),
               'slate'        => __( 'Slate', 'wpTheme' ),
               'solar'        => __( 'Solar', 'wpTheme' ),
               'spacelab'     => __( 'Spacelab', 'wpTheme' ),
               'superhero'    => __( 'Superhero', 'wpTheme' ),
               'united'       => __( 'United', 'wpTheme' ),
               'yeti'         => __( 'Yeti', 'wpTheme' ),
          );
          return $skins;
     }
}
?>
<?php
/*
	======================================
		CHOICES - SCREEN SIZE
	======================================
*
* Validate SCREEN SIZE options
*/
if ( !function_exists( 'wpTheme_screen_size' ) )
{
     function wpTheme_screen_size()
     {
          $screen_sizes = array(
               '-'            => __( 'Extra small (<576px)', 'wpTheme' ),
               '-sm-'         => __( 'Small (≥576px)', 'wpTheme' ),
               '-md-'         => __( 'Medium (≥768px)', 'wpTheme' ),
               '-lg-'         => __( 'Large (≥992px)', 'wpTheme' ),
               '-xl-'         => __( 'Extra large (≥1200px)', 'wpTheme' )

          );
          return $screen_sizes;
     }
}
?>
<?php
/*
	=================================================
		CHOICES - NAVIGATION BAR BACKGROUND COLOR
	=================================================
*
* Validate CUSTOM FIELDS options
*/
if ( !function_exists( 'wpTheme_nav_menu_color' ) )
{
     function wpTheme_nav_menu_color()
     {
          $color = array (
               '' => __( 'None', 'wpTheme' ),
               'navbar-dark bg-dark' => __( 'Dark', 'wpTheme' ),
               'navbar-dark bg-primary' => __( 'Dark-Primary', 'wpTheme' ),
               'navbar-dark bg-secondary' => __( 'Dark-Secondary', 'wpTheme' ),
               'navbar-dark bg-success' => __( 'Dark-Success', 'wpTheme' ),
               'navbar-dark bg-danger' => __( 'Dark-Danger', 'wpTheme' ),
               'navbar-dark bg-warning' => __( 'Dark-Warning', 'wpTheme' ),
               'navbar-dark bg-info' => __( 'Dark-Info', 'wpTheme' ),
               'navbar-light bg-light' => __( 'Ligh-light', 'wpTheme' ),
               'navbar-light bg-white' => __( 'Ligh-White', 'wpTheme' )

          );
          return ($color);
     }
}
?>
<?php
/*
	=================================================
		CHOICES - AUTO MARGINS
	=================================================
*
* Validate CUSTOM FIELDS options
*/
if ( !function_exists( 'wpTheme_nav_menu_auto_margins' ) )
{
     function wpTheme_nav_menu_auto_margins()
     {
          $color = array (
               '' => __( "Don't Push Items", 'wpTheme' ),
               'mr-auto' => __( 'To the Right', 'wpTheme' ),
               'ml-auto' => __( 'To the Left', 'wpTheme' )

          );
          return ($color);
     }
}
?>
<?php
/*
	=================================================
		CHOICES - PERCENTAGES
	=================================================
*
* Validate custom percentages
*/
if ( !function_exists( 'wpTheme_percentages' ) )
{
     function wpTheme_percentages()
     {
          $percentage = array (
               '' => __( " ", 'wpTheme' ),
               '10' => __( '10%', 'wpTheme' ),
               '20' => __( '20%', 'wpTheme' ),
               '30' => __( '30%', 'wpTheme' ),
               '40' => __( '40%', 'wpTheme' ),
               '50' => __( '50%', 'wpTheme' ),
               '60' => __( '60%', 'wpTheme' ),
               '70' => __( '70%', 'wpTheme' ),
               '80' => __( '80%', 'wpTheme' ),
               '90' => __( '90%', 'wpTheme' ),
               '100' => __( '100%', 'wpTheme' )
          );
          return ($percentage);
     }
}
?>
<?php
/*
	======================================
		CHOICES - CUSTOM FIELDS
	======================================
*
* Validate CUSTOM FIELDS options
*/
if ( !function_exists( 'wpTheme_custom_fields' ) )
{
     function wpTheme_custom_fields()
     {
          class wpTheme_Textarea_Control extends WP_Customize_Control
          {
     		public $type = 'textarea';
     		public function render_content()
               {
     			?>
     			<label>
     				<span class="customize-control-title">
                              <?php echo esc_html( $this->label ); ?>
                         </span>
     				<textarea rows="10" style="width:100%; font-family: monospace;" <?php $this->link(); ?>>
                              <?php echo esc_textarea( stripslashes_deep( $this->value() ) ); ?>
                         </textarea>
     			</label>
     			<?php
     		}

     	}
     }
     add_action( 'customize_register', 'wpTheme_custom_fields' );
}
?>
