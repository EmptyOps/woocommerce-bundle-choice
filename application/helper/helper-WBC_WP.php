<?php
defined( 'ABSPATH' ) || exit;

class WBC_WP {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() { }

	public static function eo_wbc_has_shortcode($content, $tag){
        return function_exists('has_shortcode')
                    ?
                has_shortcode($content,$tag)
                    :
                self::eo_wbc_wp_has_shortcode($content,$tag);
    }

    private function eo_wbc_wp_has_shortcode( $content, $tag ) {
            if ( false === strpos( $content, '[' ) ) {
                    return false;
            }
    
            if ( self::eo_wbc_wp_shortcode_exists( $tag ) ) {
                    preg_match_all( '/' . get_shortcode_regex() . '/', $content, $matches, PREG_SET_ORDER );
                    if ( empty( $matches ) )
                            return false;
    
                    foreach ( $matches as $shortcode ) {
                            if ( $tag === $shortcode[2] ) {
                                    return true;
                            } elseif ( ! empty( $shortcode[5] ) && self::eo_wbc_wp_has_shortcode( $shortcode[5], $tag ) ) {
                                    return true;
                            }
                    }
            }
            return false;
    }

    private function eo_wbc_wp_shortcode_exists( $tag ) {
            global $shortcode_tags;
            return array_key_exists( $tag, $shortcode_tags );
    }

    //EO_WBC_Support::get_term_by_term_taxonomy_id  //This thing is cachable so consider future upgradation
    public static function get_term_by_term_taxonomy_id($id){
        
        global $wpdb;
        $term = $wpdb->get_row( $wpdb->prepare( "SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE term_taxonomy_id = %s", $id ) . " LIMIT 1" );

        return empty($term)?FALSE:$term;
    }

    public static function eo_wbc_is_customize_preview() {
        
        if(function_exists('is_customize_preview')){
            return is_customize_preview();
        } else {
            global $wp_customize;         
            return ( $wp_customize instanceof WP_Customize_Manager ) && $wp_customize->is_preview();    
        }            
    }     

    public function sanitize_email($param){
        return sanitize_email($param);
    }

    public function sanitize_file_name($param){
        return sanitize_file_name($param);
    }

    public function sanitize_html_class($param){
        return sanitize_html_class($param);
    }

    public function sanitize_key($param){
        return sanitize_key($param);
    }

    public function sanitize_mime_type($param){
        return sanitize_mime_type($param);
    }

    public function sanitize_option($param){
        return sanitize_option($param);
    }

    public function sanitize_sql_orderby($param){
        return sanitize_sql_orderby($param);
    }

    public function sanitize_text_field($param){
        return sanitize_text_field($param);
    }

    public function sanitize_title($param){
        return sanitize_title($param);
    }

    public function sanitize_title_for_query($param){
        return sanitize_title_for_query($param);
    }
    public function sanitize_title_with_dashes($param){
        return sanitize_title_with_dashes($param);
    }
    public function sanitize_user($param){
        return sanitize_user($param);
    }
    public function esc_url_raw($param){
        return esc_url_raw($param);
    }
    public function wp_filter_post_kses($param){
        return wp_filter_post_kses($param);
    }
    public function wp_filter_nohtml_kses($param){
        return wp_filter_nohtml_kses($param);
    }
    public function sanitize_hex_color($param){
        return sanitize_hex_color($param);
    }

    public function cat_id2slug($id) {
        if(term_exists($id,'product_cat')) {
            return wbc()->wc->get_term_by('id',$id,'product_cat')->slug;
        } else {
            return false;
        }         
    }
    public function get_template() {

        return basename(get_stylesheet_directory_uri());
    }


    /* Add image to the wordpress image media gallary */
    public function add_image_gallary($path) {

        if(!$path) return FALSE;

        $name = basename($path);

        $attachment_check=new \Wp_Query( array(
            'posts_per_page' => 1,
            'post_type'      => 'attachment',
            'name'           => implode('-',explode(' ',strtolower($name))).'-image'
        ));

        if ( $attachment_check->have_posts() ) {
          $posts=$attachment_check->get_posts();
          return $posts[0]->ID;
        }

        //$file = wp_upload_bits($name, null, file_get_contents($path));
        ///////////// 14-05-2022 -- @drashti /////////////

        $file_bits = wbc()->common->file_get_contents($path);

        $file = wp_upload_bits($name, null, $file_bits);
        
        /////////////////////////////////////////////////

        if (!$file['error']) {

            $type = wp_check_filetype($name, null );

            $attachment = array(
                'post_mime_type' => $type['type'],
                'post_parent' => null,
                'post_title' => preg_replace('/\.[^.]+$/', '', $name),
                'post_content' => '',
                'post_status' => 'inherit'
            );

            $id = wp_insert_attachment( $attachment, $file['file'], null );

            if (!is_wp_error($id)) {

                require_once(ABSPATH . "wp-admin" . '/includes/image.php');

                $data = wp_generate_attachment_metadata( $id, $file['file'] );
                wp_update_attachment_metadata( $id, $data );

                return $id;

            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }


    ////////////////////////////////////////////////////////////////////////
    //////////////////////// Theme Function ///////////////////////////////
   public function get_theme_mod($key,$default='') {
        if(empty($key)){
            return '';
        }
        return get_theme_mod($key,$default);
    }

    public function get_stylesheet_directory_uri() {
        if(function_exists('get_stylesheet_directory_uri')) {
            return get_stylesheet_directory_uri();
        } else {
            return '';
        }
    }

    public function get_template_directory_uri() {
        if(function_exists('get_template_directory_uri')) {
            return get_template_directory_uri();
        } else {
            return '';
        }
    }

    public function wishlist_header( $echo = true ) {
        if(empty($echo)){
            ob_start();
        }
        echo do_shortcode('[ti_wishlist_products_counter]');
        if(empty($echo)){
            return ob_get_clean();
        }
    }

    public function registation_template_html(){
        ob_start();
        wc_get_template('myaccount/form-login.php',array('registration_only'=>true));
        $registration_only = ob_get_clean();

        return $registration_only;
    }
}
