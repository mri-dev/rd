<?php

class CubeNavSC
{
  const SCTAG = 'cube-nav';

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

      $output = '<div class="'.self::SCTAG.'-holder">';
      $output .= (new ShortcodeTemplates('CubeNav'))->load_template();
      $output .= '</div>';

      /* Return the output of the tooltip. */
      return apply_filters( self::SCTAG, $output );
  }
}

new CubeNavSC();

?>
