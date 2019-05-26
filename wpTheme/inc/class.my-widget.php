<?php
/*

@package WordPress
@subpackage wpTheme
@since wpTheme

	===================================
		MY WIDGET CLASS
	===================================
* This page is always used as the site front page if it exists,
* regardless of what settings on Admin > Settings > Reading..
*
*/
?>
<?php
class my_widget extends WP_Widget {

    public function __construct() {
      parent::__construct(
          'wp_widget',  // Base ID
          'WP Widget FROM THE THEME'   // Name
      );
    }
    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );

    public function widget($args, $instance)
    {
      echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) )
        {
          echo $args['before_title'];
            echo apply_filters( 'widget_title', $instance['title'] );
          echo $args['after_title'];
        }
        echo '<div class="textwidget">';
          echo esc_html__( $instance['text'], 'text_domain' );
        echo '</div>';
      echo $args['after_widget'];
    }

    public function form( $instance )
    {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php

    }

    public function update($new_instance, $old_instance)
    {
      $instance = array();

      $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
      $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';

      return $instance;
    }

}
$my_widget = new My_Widget();
?>
