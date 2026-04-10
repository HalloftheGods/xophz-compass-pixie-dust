<?php

/**
 * Register custom post type for pixels.
 *
 * @since      1.0.0
 * @package    Xophz_Compass_Pixie_Dust
 * @subpackage Xophz_Compass_Pixie_Dust/includes
 */

class Xophz_Compass_Pixie_Dust_Post_Type {

  /**
   * The post type name.
   */
  const POST_TYPE = 'compass_pixie_pixel';

  /**
   * Pre-built pixel templates with their script patterns.
   */
  const PIXEL_TEMPLATES = array(
    'facebook' => array(
      'name'     => 'Facebook Pixel',
      'icon'     => 'facebook',
      'head'     => "<!-- Facebook Pixel Code -->\n<script>\n!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;\nn.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;\nt.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,\ndocument,'script','https://connect.facebook.net/en_US/fbevents.js');\nfbq('init', '{{PIXEL_ID}}');\nfbq('track', 'PageView');\n</script>\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\" src=\"https://www.facebook.com/tr?id={{PIXEL_ID}}&ev=PageView&noscript=1\" /></noscript>\n<!-- End Facebook Pixel Code -->"
    ),
    'ga4' => array(
      'name'     => 'Google Analytics 4',
      'icon'     => 'chart-line',
      'head'     => "<!-- Google Analytics 4 -->\n<script async src=\"https://www.googletagmanager.com/gtag/js?id={{PIXEL_ID}}\"></script>\n<script>\nwindow.dataLayer = window.dataLayer || [];\nfunction gtag(){dataLayer.push(arguments);}\ngtag('js', new Date());\ngtag('config', '{{PIXEL_ID}}');\n</script>\n<!-- End Google Analytics 4 -->"
    ),
    'gtm' => array(
      'name'     => 'Google Tag Manager',
      'icon'     => 'tags',
      'head'     => "<!-- Google Tag Manager -->\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':\nnew Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],\nj=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=\n'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);\n})(window,document,'script','dataLayer','{{PIXEL_ID}}');</script>\n<!-- End Google Tag Manager -->",
      'body_open' => "<!-- Google Tag Manager (noscript) -->\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id={{PIXEL_ID}}\"\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\n<!-- End Google Tag Manager (noscript) -->"
    ),
    'google_ads' => array(
      'name'     => 'Google Ads',
      'icon'     => 'ad',
      'head'     => "<!-- Global site tag (gtag.js) - Google Ads -->\n<script async src=\"https://www.googletagmanager.com/gtag/js?id={{PIXEL_ID}}\"></script>\n<script>\nwindow.dataLayer = window.dataLayer || [];\nfunction gtag(){dataLayer.push(arguments);}\ngtag('js', new Date());\ngtag('config', '{{PIXEL_ID}}');\n</script>\n<!-- End Google Ads -->"
    ),
    'tiktok' => array(
      'name'     => 'TikTok Pixel',
      'icon'     => 'music',
      'head'     => "<!-- TikTok Pixel Code -->\n<script>\n!function (w, d, t) {\n  w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=[\"page\",\"track\",\"identify\",\"instances\",\"debug\",\"on\",\"off\",\"once\",\"ready\",\"alias\",\"group\",\"enableCookie\",\"disableCookie\"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i=\"https://analytics.tiktok.com/i18n/pixel/events.js\";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement(\"script\");o.type=\"text/javascript\",o.async=!0,o.src=i+\"?sdkid=\"+e+\"&lib=\"+t;var a=document.getElementsByTagName(\"script\")[0];a.parentNode.insertBefore(o,a)};\n  ttq.load('{{PIXEL_ID}}');\n  ttq.page();\n}(window, document, 'ttq');\n</script>\n<!-- End TikTok Pixel Code -->"
    ),
    'linkedin' => array(
      'name'     => 'LinkedIn Insight Tag',
      'icon'     => 'linkedin',
      'head'     => "<!-- LinkedIn Insight Tag -->\n<script type=\"text/javascript\">\n_linkedin_partner_id = \"{{PIXEL_ID}}\";\nwindow._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];\nwindow._linkedin_data_partner_ids.push(_linkedin_partner_id);\n</script>\n<script type=\"text/javascript\">\n(function(l) {\nif (!l){window.lintrk = function(a,b){window.lintrk.q.push([a,b])};\nwindow.lintrk.q=[]}\nvar s = document.getElementsByTagName(\"script\")[0];\nvar b = document.createElement(\"script\");\nb.type = \"text/javascript\";b.async = true;\nb.src = \"https://snap.licdn.com/li.lms-analytics/insight.min.js\";\ns.parentNode.insertBefore(b, s);})(window.lintrk);\n</script>\n<noscript><img height=\"1\" width=\"1\" style=\"display:none;\" alt=\"\" src=\"https://px.ads.linkedin.com/collect/?pid={{PIXEL_ID}}&fmt=gif\" /></noscript>\n<!-- End LinkedIn Insight Tag -->"
    ),
    'pinterest' => array(
      'name'     => 'Pinterest Tag',
      'icon'     => 'thumbtack',
      'head'     => "<!-- Pinterest Tag -->\n<script>\n!function(e){if(!window.pintrk){window.pintrk = function () {\nwindow.pintrk.queue.push(Array.prototype.slice.call(arguments))};var\nn=window.pintrk;n.queue=[],n.version=\"3.0\";var\nt=document.createElement(\"script\");t.async=!0,t.src=e;var\nr=document.getElementsByTagName(\"script\")[0];\nr.parentNode.insertBefore(t,r)}}(\"https://s.pinimg.com/ct/core.js\");\npintrk('load', '{{PIXEL_ID}}');\npintrk('page');\n</script>\n<noscript><img height=\"1\" width=\"1\" style=\"display:none;\" alt=\"\" src=\"https://ct.pinterest.com/v3/?event=init&tid={{PIXEL_ID}}&noscript=1\" /></noscript>\n<!-- End Pinterest Tag -->"
    ),
    'custom' => array(
      'name'     => 'Custom Code',
      'icon'     => 'code',
      'head'     => ''
    ),
  );

  /**
   * Register the custom post type.
   */
  public static function register_post_type() {
    $labels = array(
      'name'               => _x( 'Pixels', 'post type general name', 'xophz-compass-pixie-dust' ),
      'singular_name'      => _x( 'Pixel', 'post type singular name', 'xophz-compass-pixie-dust' ),
      'menu_name'          => _x( 'Pixels', 'admin menu', 'xophz-compass-pixie-dust' ),
      'add_new'            => _x( 'Add New', 'pixel', 'xophz-compass-pixie-dust' ),
      'add_new_item'       => __( 'Add New Pixel', 'xophz-compass-pixie-dust' ),
      'edit_item'          => __( 'Edit Pixel', 'xophz-compass-pixie-dust' ),
      'new_item'           => __( 'New Pixel', 'xophz-compass-pixie-dust' ),
      'view_item'          => __( 'View Pixel', 'xophz-compass-pixie-dust' ),
      'search_items'       => __( 'Search Pixels', 'xophz-compass-pixie-dust' ),
      'not_found'          => __( 'No pixels found', 'xophz-compass-pixie-dust' ),
      'not_found_in_trash' => __( 'No pixels found in Trash', 'xophz-compass-pixie-dust' ),
    );

    $args = array(
      'labels'              => $labels,
      'public'              => false,
      'publicly_queryable'  => false,
      'show_ui'             => false,
      'show_in_menu'        => false,
      'query_var'           => false,
      'capability_type'     => 'post',
      'has_archive'         => false,
      'hierarchical'        => false,
      'supports'            => array( 'title', 'custom-fields' ),
    );

    register_post_type( self::POST_TYPE, $args );
  }

  /**
   * Initialize - register post type.
   */
  public static function init() {
    self::register_post_type();
  }

  /**
   * Get pixel templates for the frontend.
   *
   * @return array Array of pixel templates.
   */
  public static function get_templates() {
    $templates = array();
    foreach ( self::PIXEL_TEMPLATES as $type => $template ) {
      $templates[] = array(
        'type' => $type,
        'name' => $template['name'],
        'icon' => $template['icon'],
      );
    }
    return $templates;
  }

  /**
   * Get a pixel by ID.
   *
   * @param int $id Pixel post ID.
   * @return array|null Pixel data or null if not found.
   */
  public static function get_pixel( $id ) {
    $post = get_post( $id );
    if ( ! $post || $post->post_type !== self::POST_TYPE ) {
      return null;
    }

    return self::format_pixel( $post );
  }

  /**
   * Get all pixels.
   *
   * @return array Array of pixel data.
   */
  public static function get_all_pixels() {
    $posts = get_posts( array(
      'post_type'      => self::POST_TYPE,
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'orderby'        => 'title',
      'order'          => 'ASC',
    ) );

    $pixels = array();
    foreach ( $posts as $post ) {
      $pixels[] = self::format_pixel( $post );
    }

    return $pixels;
  }

  /**
   * Get stats about pixels.
   *
   * @return array Stats array.
   */
  public static function get_stats() {
    $pixels = self::get_all_pixels();
    $enabled = array_filter( $pixels, function( $p ) { return $p['enabled']; } );
    
    // Group by type
    $by_type = array();
    foreach ( $pixels as $p ) {
      $type = $p['type'];
      if ( ! isset( $by_type[ $type ] ) ) {
        $by_type[ $type ] = 0;
      }
      $by_type[ $type ]++;
    }

    return array(
      'total'   => count( $pixels ),
      'enabled' => count( $enabled ),
      'by_type' => $by_type,
    );
  }

  /**
   * Format a pixel post into a data array.
   *
   * @param WP_Post $post The pixel post.
   * @return array Formatted pixel data.
   */
  private static function format_pixel( $post ) {
    $type = get_post_meta( $post->ID, '_compass_pixel_type', true ) ?: 'custom';
    $template = isset( self::PIXEL_TEMPLATES[ $type ] ) ? self::PIXEL_TEMPLATES[ $type ] : self::PIXEL_TEMPLATES['custom'];
    
    return array(
      'id'          => $post->ID,
      'name'        => $post->post_title,
      'type'        => $type,
      'type_name'   => $template['name'],
      'icon'        => $template['icon'],
      'pixel_id'    => get_post_meta( $post->ID, '_compass_pixel_id', true ) ?: '',
      'enabled'     => (bool) get_post_meta( $post->ID, '_compass_pixel_enabled', true ),
      'placement'   => get_post_meta( $post->ID, '_compass_pixel_placement', true ) ?: 'head',
      'conditions'  => get_post_meta( $post->ID, '_compass_pixel_conditions', true ) ?: array( 'all' ),
      'custom_code' => get_post_meta( $post->ID, '_compass_pixel_custom_code', true ) ?: '',
      'created_at'  => $post->post_date,
      'updated_at'  => $post->post_modified,
    );
  }

  /**
   * Toggle a pixel's enabled state.
   *
   * @param int $id Pixel post ID.
   * @return array Updated pixel data or error.
   */
  public static function toggle_pixel( $id ) {
    $pixel = self::get_pixel( $id );
    if ( ! $pixel ) {
      return array( 'error' => 'Pixel not found' );
    }

    $new_state = ! $pixel['enabled'];
    update_post_meta( $id, '_compass_pixel_enabled', $new_state ? 1 : 0 );
    
    return self::get_pixel( $id );
  }

  /**
   * Create or update a pixel.
   *
   * @param array $data Pixel data.
   * @return array Created/updated pixel data or error.
   */
  public static function save_pixel( $data ) {
    $is_update = ! empty( $data['id'] );

    $post_data = array(
      'post_type'   => self::POST_TYPE,
      'post_title'  => sanitize_text_field( $data['name'] ),
      'post_status' => 'publish',
    );

    if ( $is_update ) {
      $post_data['ID'] = intval( $data['id'] );
      $post_id = wp_update_post( $post_data );
    } else {
      $post_id = wp_insert_post( $post_data );
    }

    if ( is_wp_error( $post_id ) ) {
      return array( 'error' => $post_id->get_error_message() );
    }

    // Set meta
    $type = sanitize_text_field( $data['type'] ?? 'custom' );
    update_post_meta( $post_id, '_compass_pixel_type', $type );
    update_post_meta( $post_id, '_compass_pixel_id', sanitize_text_field( $data['pixel_id'] ?? '' ) );
    update_post_meta( $post_id, '_compass_pixel_enabled', ! empty( $data['enabled'] ) ? 1 : 0 );
    update_post_meta( $post_id, '_compass_pixel_placement', sanitize_text_field( $data['placement'] ?? 'head' ) );
    update_post_meta( $post_id, '_compass_pixel_conditions', $data['conditions'] ?? array( 'all' ) );
    
    // Only save custom code for custom type
    if ( $type === 'custom' ) {
      update_post_meta( $post_id, '_compass_pixel_custom_code', $data['custom_code'] ?? '' );
    }

    return self::get_pixel( $post_id );
  }

  /**
   * Delete a pixel.
   *
   * @param int $id Pixel post ID.
   * @return bool True on success.
   */
  public static function delete_pixel( $id ) {
    $pixel = self::get_pixel( $id );
    if ( ! $pixel ) {
      return false;
    }

    return wp_delete_post( $id, true ) ? true : false;
  }

  /**
   * Get the rendered output for a pixel.
   *
   * @param array  $pixel    Pixel data.
   * @param string $location Location: head, body_open, or body_close.
   * @return string Rendered pixel code.
   */
  public static function render_pixel( $pixel, $location = 'head' ) {
    if ( ! $pixel['enabled'] ) {
      return '';
    }

    $type = $pixel['type'];
    $template = isset( self::PIXEL_TEMPLATES[ $type ] ) ? self::PIXEL_TEMPLATES[ $type ] : null;

    // Map placement to location (footer = body_close)
    $placement = $pixel['placement'];
    if ( $placement === 'footer' ) {
      $placement = 'body_close';
    }

    // Check if this pixel should render at this location
    if ( $placement !== $location ) {
      return '';
    }

    if ( $type === 'custom' ) {
      return $pixel['custom_code'];
    }

    if ( ! $template ) {
      return '';
    }

    // Get the appropriate template code for this location
    $code = '';
    if ( $location === 'head' && isset( $template['head'] ) ) {
      $code = $template['head'];
    } elseif ( $location === 'body_open' && isset( $template['body_open'] ) ) {
      $code = $template['body_open'];
    } elseif ( $location === 'body_close' && isset( $template['body_close'] ) ) {
      $code = $template['body_close'];
    }

    // Replace placeholder with actual pixel ID
    return str_replace( '{{PIXEL_ID}}', esc_attr( $pixel['pixel_id'] ), $code );
  }

  /**
   * Check if a pixel should load on the current page.
   *
   * @param array $pixel Pixel data.
   * @return bool True if should load.
   */
  public static function should_load( $pixel ) {
    if ( ! $pixel['enabled'] ) {
      return false;
    }

    $conditions = $pixel['conditions'];
    
    if ( in_array( 'all', $conditions, true ) ) {
      return true;
    }

    if ( in_array( 'home', $conditions, true ) && is_front_page() ) {
      return true;
    }

    if ( in_array( 'single', $conditions, true ) && is_singular() ) {
      return true;
    }

    if ( in_array( 'archive', $conditions, true ) && is_archive() ) {
      return true;
    }

    if ( in_array( 'shop', $conditions, true ) && function_exists( 'is_shop' ) && ( is_shop() || is_product() ) ) {
      return true;
    }

    return false;
  }
}
