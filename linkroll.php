<?php 
/*
Plugin Name: Linkroll
Description: Roll your own links and display them anywhere in your site. 
Author: Ankur Taxali 
Version: 1
Author URI: http://oldmill1.github.io/ 
*/ 

class LinkrollWidget extends WP_Widget
{ 
  function LinkrollWidget()
  { 
    $widgets_ops = array('classname' => 'LinkrollWidget', 'description' => 'Roll your own links and display them anywhere in your site.'); 
    $this->WP_Widget('LinkrollWidget', 'Linkroll widget', $widget_ops);
  } 

  function form($instance)
  { 
    $instance = wp_parse_args((array) $instance, array('title' => '', 'postone' => '', 'postone' => '', 'posttwo' => '', 'postthree' => '', 'postfour' => '', 'postfive' => '')); 
    $title = $instance['title'];
    $postone = $instance['postone'];
    $posttwo = $instance['posttwo'];
    $postthree = $instance['postthree'];
    $postfour = $instance['postfour'];
    $postfive = $instance['postfive'];
    ?> 
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">
        Title: 
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('postone'); ?>">
        Post Title:
        <input class="widefat" id="<?php echo $this->get_field_id('postone'); ?>" name="<?php echo $this->get_field_name('postone'); ?>" type="text" value="<?php echo attribute_escape($postone); ?>" />
      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('posttwo'); ?>">
        Post Title:
        <input class="widefat" id="<?php echo $this->get_field_id('posttwo'); ?>" name="<?php echo $this->get_field_name('posttwo'); ?>" type="text" value="<?php echo attribute_escape($posttwo); ?>" />
      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('postthree'); ?>">
        Post Title:
        <input class="widefat" id="<?php echo $this->get_field_id('postthree'); ?>" name="<?php echo $this->get_field_name('postthree'); ?>" type="text" value="<?php echo attribute_escape($postthree); ?>" />
      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('postfour'); ?>">
        Post Title:
        <input class="widefat" id="<?php echo $this->get_field_id('postfour'); ?>" name="<?php echo $this->get_field_name('postfour'); ?>" type="text" value="<?php echo attribute_escape($postfour); ?>" />
      </label>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('postfive'); ?>">
        Post Title:
        <input class="widefat" id="<?php echo $this->get_field_id('postfive'); ?>" name="<?php echo $this->get_field_name('postfive'); ?>" type="text" value="<?php echo attribute_escape($postfive); ?>" />
      </label>
    </p>
    <?php
  } 

  function update($new_instance, $old_instance)
  { 
    $instance = $old_instance; 
    $instance['title'] = $new_instance['title']; 
    $instance['postone'] = $new_instance['postone']; 
    $instance['posttwo'] = $new_instance['posttwo']; 
    $instance['postthree'] = $new_instance['postthree']; 
    $instance['postfour'] = $new_instance['postfour']; 
    $instance['postfive'] = $new_instance['postfive']; 
    return $instance;
  }   

  function widget($args, $instance)
  { 
    extract($args, EXTR_SKIP); 
    global $wpdb; 

    echo $before_widget; 
    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']); 
    $postone = empty($instance['postone']) ? '' : apply_filters('widget_title', $instance['postone']); 
    $posttwo = empty($instance['posttwo']) ? '' : apply_filters('widget_title', $instance['posttwo']); 
    $postthree = empty($instance['postthree']) ? '' : apply_filters('widget_title', $instance['postthree']); 
    $postfour = empty($instance['postfour']) ? '' : apply_filters('widget_title', $instance['postfour']); 
    $postfive = empty($instance['postfive']) ? '' : apply_filters('widget_title', $instance['postfive']); 
    
    if (!empty($title))
      echo $before_title . $title . $after_title; 

    if (!empty($postone)) { 
      $row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE `post_title` = '$postone';");
      echo "<div class='articleContWrap clearfix'>";
        echo "<div class='articlesText'>";
          echo "<a href='".get_permalink($row->ID)."'>".get_the_post_thumbnail($row->ID, array(100, 100))."</a>";
          echo "<a href='".get_permalink($row->ID)."'>$row->post_title</a>";
        echo "</div>";
      echo "</div>";
    }

    if (!empty($posttwo)) { 
      $row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE `post_title` = '$posttwo';");
      echo "<div class='articleContWrap clearfix'>";
        echo "<div class='articlesText'>";
        echo "<a href='".get_permalink($row->ID)."'>".get_the_post_thumbnail($row->ID, array(100, 100))."</a>";
          echo "<a href='".get_permalink($row->ID)."'>$row->post_title</a>";
        echo "</div>";
      echo "</div>";
    }

    if (!empty($postthree)) { 
      $row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE `post_title` = '$postthree';");
      echo "<div class='articleContWrap clearfix'>";
        echo "<div class='articlesText'>";
          echo "<a href='".get_permalink($row->ID)."'>".get_the_post_thumbnail($row->ID, array(100, 100))."</a>";
          echo "<a href='".get_permalink($row->ID)."'>$row->post_title</a>";
        echo "</div>";
      echo "</div>";
    }

    if (!empty($postfour)) { 
      $row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE `post_title` = '$postfour';");
      echo "<div class='articleContWrap clearfix'>";
        echo "<div class='articlesText'>";
          echo "<a href='".get_permalink($row->ID)."'>".get_the_post_thumbnail($row->ID, array(100, 100))."</a>";
          echo "<a href='".get_permalink($row->ID)."'>$row->post_title</a>";
        echo "</div>";
      echo "</div>";
    }

    if (!empty($postfive)) { 
      $row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE `post_title` = '$postfive';");
      echo "<div class='articleContWrap clearfix'>";
        echo "<div class='articlesText'>";
          echo "<a href='".get_permalink($row->ID)."'>".get_the_post_thumbnail($row->ID, array(100, 100))."</a>";
          echo "<a href='".get_permalink($row->ID)."'>$row->post_title</a>";
        echo "</div>";
      echo "</div>";
    }

    echo $after_widget; 

  } 
}

add_action('widgets_init', create_function('', 'return register_widget("LinkrollWidget");')); 


// code for shortcode like [linkroll post="My Blog Post"]
function linkroll_func($atts)
{ 
  extract( shortcode_atts(array(
      'post' => '',
      'attr' => '', 
      'label' => 'Related: ',
    ), $atts ));

  global $wpdb;
  $row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE `post_title` = '$post';");
  $output = "<div id='linkroll_site'>";
  $output .= '<p>'.$label.'<a href="'.get_permalink($row->ID).'">'.$row->post_title.'</a></p>';
  $output .= "</div>";
  return wptexturize($output);

} 

add_shortcode( 'linkroll', 'linkroll_func' );























































































