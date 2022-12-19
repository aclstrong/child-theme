<?php
/**
 * Astra Child Theme Theme functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child Theme
 * @since   1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_THEME_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-theme-theme-css', get_stylesheet_directory_uri() . '/style.css', array( 'astra-theme-css' ), CHILD_THEME_ASTRA_CHILD_THEME_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

add_filter( 'woocommerce_default_address_fields', 'customising_checkout_fields', 1000, 1 );
function customising_checkout_fields( $address_fields ) {
	$address_fields['country']['required']  = FALSE;
	$address_fields['city']['required']     = FALSE;
	$address_fields['state']['required']    = FALSE;
	$address_fields['postcode']['required'] = FALSE;

	return $address_fields;
}

add_filter( 'woocommerce_billing_fields', 'wc_unrequire_wc_billing_address_1_field' );
function wc_unrequire_wc_billing_address_1_field( $fields ) {
	$fields['billing_address_1']['required'] = FALSE;
	return $fields;
}

add_action( 'wp_head', 'aclstrong_ga_code' );
function aclstrong_ga_code() {
	?>


  <!-- GA Google Analytics @ https://m0n.co/ga -->
  <script>
    (function( i, s, o, g, r, a, m ) {
      i[ 'GoogleAnalyticsObject' ] = r;
      i[ r ] = i[ r ] || function() {
        (i[ r ].q = i[ r ].q || []).push( arguments )
      }, i[ r ].l = 1 * new Date();
      a = s.createElement( o ),
        m = s.getElementsByTagName( o )[ 0 ];
      a.async = 1;
      a.src   = g;
      m.parentNode.insertBefore( a, m )
    })( window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga' );
    ga( 'create', 'UA-102354581-1', 'auto' );
    ga( 'send', 'pageview' );
  </script>

  <!-- Deadline Funnel -->
  <script type="text/javascript" data-cfasync="false">function SendUrlToDeadlineFunnel( e ) {
      var r, t, c, a, h, n, o, A, i = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=", d = 0, l = 0, s = "", u = [];
      if ( !e ) return e;
      do r = e.charCodeAt( d++ ), t = e.charCodeAt( d++ ), c = e.charCodeAt( d++ ), A = r << 16 | t << 8 | c, a = A >> 18 & 63, h = A >> 12 & 63, n = A >> 6 & 63, o = 63 & A, u[ l++ ] = i.charAt( a ) + i.charAt( h ) + i.charAt( n ) + i.charAt( o ); while ( d < e.length );
      s           = u.join( "" );
      var C       = e.length % 3;
      var decoded = (C ? s.slice( 0, C - 3 ) : s) + "===".slice( C || 3 );
      decoded     = decoded.replace( "+", "-" );
      decoded     = decoded.replace( "/", "_" );
      return decoded;
    }

    var dfUrl = SendUrlToDeadlineFunnel( location.href );
    var dfParentUrlValue;
    try {
      dfParentUrlValue = window.parent.location.href;
    } catch ( err ) {
      if ( err.name === "SecurityError" ) {
        dfParentUrlValue = document.referrer;
      }
    }
    var dfParentUrl = (parent !== window) ? ("/" + SendUrlToDeadlineFunnel( dfParentUrlValue )) : "";
    (function() {
      var s   = document.createElement( "script" );
      s.type  = "text/javascript";
      s.async = true;
      s.setAttribute( "data-scriptid", "dfunifiedcode" );
      s.src  = "https://a.deadlinefunnel.com/unified/reactunified.bundle.js?userIdHash=eyJpdiI6InZRZ3pFaXMxLzBDNTNESTI3OGYzRGc9PSIsInZhbHVlIjoiakdpZjNHZTRGeDg0UVJQZEVHdW9PZz09IiwibWFjIjoiOGM0MTA2M2M5ZmMwZWJmZjljMzk2MzE1ZmU3NTdmNmFlZmMxM2VjMmVlNjdmNDk3M2ZhMjMxMGUxYmM5YjdmZCJ9&pageFromUrl=" + dfUrl + "&parentPageFromUrl=" + dfParentUrl;
      var s2 = document.getElementsByTagName( "script" )[ 0 ];
      s2.parentNode.insertBefore( s, s2 );
    })();</script>
  <!-- End Deadline Funnel -->
  <meta name="facebook-domain-verification" content="fvn14sxw8fzl11cnb48aguw0waydmv"/>
	<?php
}

//if ( ! is_admin() ) {
//	function aclstrong_search_filter( $query ) {
//
//		if ( $query->is_search ) {
//			$query->set( 'post_type', [ 'post', 'page' ] );
//		}
//		return $query;
//	}
//
//	add_filter( 'pre_get_posts', 'aclstrong_search_filter' );
//}
