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
               'cerulean.css' => __( 'Cerulean', 'wpTheme' ),
               'darkly.css' => __( 'Darkly', 'wpTheme' ),
               'litera.css' => __( 'Litera', 'wpTheme' )
          );
          return $skins;
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
