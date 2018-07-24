<?php
/**
 * Plugin Name:   Example Widget Plugin
 * Plugin URI:    https://jonpenland.com
 * Description:   Adds an example widget that displays the site title and tagline in a widget area.
 * Version:       1.0
 * Author:        Jon Penland
 * Author URI:    https://www.jonpenland.com
 */

class jpen_Example_Widget extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'example_widget', 'description' => 'This is an Example Widget' );
    parent::__construct( 'example_widget', 'Example Widget', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $blog_title = get_bloginfo( 'name' );
    $tagline = get_bloginfo( 'description' );
    $localist = 'http://ucsc.staging.localist.com/event/';

    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
    <p><strong>Site Name:</strong> <?php echo $blog_title ?></p>
    <p><strong>Tagline:</strong> <?php echo $tagline ?></p>

    <?php //call and parse data from Localist API
    
    $request = wp_remote_get( 'http://ucsc.staging.localist.com/api/2/events?days=30' );

    if(is_wp_error($request)){
        return false; //Bail Early
    }
    $body = wp_remote_retrieve_body($request);
    $data = json_decode($body);
    if(!empty($data)){
        echo '<ul>';
        foreach ($data->events as $event){
            echo '<li>';
            // echo '<a href="'. esc_url($event->event->url).'">'.$event->event->title.'</a>';
            echo '<a href="'.$localist.$event->event->urlname.'">'.$event->event->title.'</a>';
            // echo '<p>'.$event->event->description_text.'</p>';
            echo '</li>';
        }
        echo '</ul>';
    }

    ?>
    <?php echo $args['after_widget'];
  }

  
  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p><?php
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    return $instance;
  }

}

// Register the widget.
function jpen_register_example_widget() { 
  register_widget( 'jpen_Example_Widget' );
}
add_action( 'widgets_init', 'jpen_register_example_widget' );