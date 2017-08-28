<?php

class BlogListerSC
{
  const SCTAG = 'bloglister';

  public function __construct()
  {
      add_action( 'init', array( &$this, 'register_shortcode' ) );
  }

  public function register_shortcode() {
      add_shortcode( self::SCTAG, array( &$this, 'do_shortcode' ) );
  }

  public function do_shortcode( $attr, $content = null )
  {

  	  /* Set up the default arguments. */
      $defaults = apply_filters(
          self::SCTAG.'_defaults',
          array(
            'style' => 'grid-2fav'
          )
      );
      /* Parse the arguments. */
      $attr = shortcode_atts( $defaults, $attr );

      $data = new WP_Query(array(
        'posts_per_page' => 6
      ));

      $output = '<div class="'.self::SCTAG.'-holder style-'.$attr['style'].'">';
      $output .= (new ShortcodeTemplates('BlogLister-'.$attr['style']))->load_template(array(
        'attr' => $attr,
        'data' => $data
      ));
      $output .= '</div>';

      /* Return the output of the tooltip. */
      return apply_filters( self::SCTAG, $output );
  }
}

new BlogListerSC();

?>
