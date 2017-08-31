<?php
define('PROTOCOL', 'https');
define('TARGETDOMAIN', 'rubinszki.web-pro.hu');
define('DOMAIN', $_SERVER['HTTP_HOST']);
define('IFROOT', str_replace(get_option('siteurl'), '//'.DOMAIN, get_stylesheet_directory_uri()));
define('DEVMODE', true);
define('IMG', IFROOT.'/images');
//define('GOOGLE_API_KEY', 'AIzaSyA0Mu8_XYUGo9iXhoenj7HTPBIfS2jDU2E');
define('GOOGLE_API_KEY', 'AIzaSyD99pf6f7JFVgvmiieIvtlJyMlS15I36qg');
define('LANGKEY','hu');
define('FB_APP_ID', '');
define('DEFAULT_LANGUAGE', 'hu_HU');

// Includes
require_once "includes/include.php";

function theme_enqueue_styles() {
    wp_enqueue_style( 'avada-parent-stylesheet', get_template_directory_uri() . '/style.css?' . ( (DEVMODE === true) ? time() : '' )  );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


function add_opengraph_doctype( $output ) {
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

function app_locale( $locale )
{
  /*
    $lang = explode('/', $_SERVER['REQUEST_URI']);
    if(array_pop($lang) === 'en'){
      $locale = 'en_US';
    }else{
      $locale = 'gr_GR';
    }*/
    //$locale = 'en_US';

    return $locale;
}

add_filter('locale','app_locale', 10);

function facebook_og_meta_header()
{
  global $wp_query;

  $title = get_option('blogname');
  $image = '';
  $desc  = get_option('blogdescription');
  $url   = get_option('site_url');

  echo '<meta property="fb:app_id" content="'.FB_APP_ID.'"/>'."\n";
  echo '<meta property="og:title" content="' . $title . '"/>'."\n";
  echo '<meta property="og:type" content="article"/>'."\n";
  echo '<meta property="og:url" content="' . $url . '/"/>'."\n";
  echo '<meta property="og:description" content="' . $desc . '/"/>'."\n";
  echo '<meta property="og:site_name" content="'.get_option('blogname').'"/>'."\n";
  echo '<meta property="og:image" content="' . $image . '"/>'."\n";

}
add_action( 'wp_head', 'facebook_og_meta_header', 5);

function custom_js_script_footer()
{
  ?>
  <script>
      var map;
      function initMap() {
        var mapPosition = new google.maps.LatLng(46.071469, 18.233967);
        map = new google.maps.Map(document.getElementById('map'), {
          center: mapPosition,
          zoom: 17,
          disableDefaultUI: true
        });
        map.panBy((1200/2/2), 0);

        var marker = new google.maps.Marker({
          position: mapPosition,
          map: map,
          icon: {
        		url: "<?=IMG?>/ga-map-pin.png",
        		scaledSize: new google.maps.Size(26, 40)
        	}
        });
      }

      (function($){
        $(window).resize(function(){
          var bcw = $('.fusion-footer-widget-area > .fusion-row').width();
          $('#contact-form-wrapper').width((bcw/2)-50+3);

          $('.bloglister-holder.style-grid-2fav .item.square-simple').height($('.bloglister-holder.style-grid-2fav .item.square-simple').width());
          $('.cube-nav-holder .holder-wrapper .item.item-grafika, .cube-nav-holder .holder-wrapper .item.item-dekor, .cube-nav-holder .holder-wrapper .tbl-group.rendezveny')
          .height($(window).width()/3);
          $('.cube-nav-holder .holder-wrapper .tbl-group.marketing').height(($(window).width()/3)*2);
          $('.cube-nav-holder .holder-wrapper .tbl-group.nyomtatas-web .tblwrapper .item.item-nyomtatas, .cube-nav-holder .holder-wrapper .tbl-group.nyomtatas-web .tblwrapper .item.item-web')
          .height(($(window).width()/3)/2);
          $('.bloglister-holder.style-grid-2fav > .item.item1,.bloglister-holder.style-grid-2fav > .item.item2').height(($(window).width()/2));
        });

        $('.slick-slider-app .strong-content').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: false,
          centerMode: true,
          autoplaySpeed: 2000,
        });
      })(jQuery);
    </script>
  <?php
}
add_action( 'wp_footer', 'custom_js_script_footer', 1);

function custom_theme_enqueue_styles() {
  wp_enqueue_style( 'app-css', IFROOT . '/assets/css/style.css?t=' . ( (DEVMODE === true) ? time() : '' ) );
}
add_action( 'wp_enqueue_scripts', 'custom_theme_enqueue_styles', 100 );

function custom_theme_enqueue_styles_in_footer() {
  wp_enqueue_script( 'google-maps', '//maps.googleapis.com/maps/api/js?sensor=false&language='.get_locale().'&region=hu&libraries=places&key='.GOOGLE_API_KEY.'&callback=initMap', array(), 1, true);
}
add_action( 'wp_enqueue_scripts', 'custom_theme_enqueue_styles_in_footer', 999 );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/langs';
	load_child_theme_textdomain( 'rd', $lang );

  $ucid = ucid();
  $ucid = $_COOKIE['uid'];
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

function ucid()
{
  $ucid = $_COOKIE['ucid'];

  if (!isset($ucid)) {
    $ucid = mt_rand();
    setcookie( 'ucid', $ucid, time() + 60*60*24*365*2, "/");
  }

  return $ucid;
}

function rd_init()
{
  date_default_timezone_set('Europe/Budapest');
}
add_action('init', 'rd_init');


function rd_query_vars($aVars) {
  return $aVars;
}
add_filter('query_vars', 'rd_query_vars');

/**
* AJAX REQUESTS
*/
function ajax_requests()
{
  //$ajax = new AjaxRequests();
}
add_action( 'init', 'ajax_requests' );

// AJAX URL
function get_ajax_url( $function )
{
  return admin_url('admin-ajax.php?action='.$function);
}

function after_logo_content()
{

}
add_filter('avada_logo_append', 'after_logo_content');


/* GOOGLE ANALYTICS */
if( defined('DEVMODE') && DEVMODE === false ) {
	function ga_tracking_code () {
		?>
		<script>


		</script>
		<?
	}
	add_action('wp_footer', 'ga_tracking_code');
}

function memory_convert($size)
{
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}
