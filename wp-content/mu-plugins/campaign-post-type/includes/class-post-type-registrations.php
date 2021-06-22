<?php
/**
 * Campaign Post Type
 *
 * @package   Campaign_Post_Type
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package Campaign_Post_Type
 */
class Campaign_Post_Type_Registrations {

	public $post_type = 'campaign';

	public $taxonomies = array(
	    /*'regions',*/
    );

	public function init() {
		// Add the Campaign post type and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses Campaign_Post_Type_Registrations::register_post_type()
	 * @uses Campaign_Post_Type_Registrations::register_taxonomy_category()
	 */
	public function register() {
		// register taxonomies first so their similar slugs will match
		$this->register_taxonomy_category();
		$this->register_post_type();

		// Customizes the post's permalink
		add_filter( 'post_type_link', array( $this, 'customize_post_permalink'), 10, 4);
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Campaigns', 'campaign-post-type' ),
			'singular_name'      => __( 'Campaign', 'campaign-post-type' ),
			'add_new'            => __( 'Add Campaign', 'campaign-post-type' ),
			'add_new_item'       => __( 'Add Campaign', 'campaign-post-type' ),
			'edit_item'          => __( 'Edit Campaign', 'campaign-post-type' ),
			'new_item'           => __( 'New Campaign', 'campaign-post-type' ),
			'view_item'          => __( 'View Campaign', 'campaign-post-type' ),
			'search_items'       => __( 'Search Campaigns', 'campaign-post-type' ),
			'not_found'          => __( 'No Campaigns found', 'campaign-post-type' ),
			'not_found_in_trash' => __( 'No Campaigns in the trash', 'campaign-post-type' ),
		);

		$supports = array(
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
		);

		$args = array(
			'labels'          => $labels,
			'supports'        => $supports,
			'show_in_rest'    => true, // required for Gutenberg
			'public'          => true,
			'capability_type' => 'page',
			'rewrite'         => array( 'slug' => 'campaigns', 'with_front' => false ),
			'menu_position'   => 31,
			'menu_icon'       => 'dashicons-tag',
			'has_archive'     => false,
			//'taxonomies'      => $taxonomies
		);

		$args = apply_filters( 'campaign_post_type_args', $args );

		register_post_type( $this->post_type, $args );
	}

    /**
     * Register a taxonomy for Campaign Regions.
     */
    protected function register_taxonomy_category() {
      /*
        $labels = array(
            'name'                       => __( 'Regions', 'campaign-post-type' ),
            'singular_name'              => __( 'Region', 'campaign-post-type' ),
            'menu_name'                  => __( 'Regions', 'campaign-post-type' ),
            'edit_item'                  => __( 'Edit Region', 'campaign-post-type' ),
            'update_item'                => __( 'Update Region', 'campaign-post-type' ),
            'add_new_item'               => __( 'Add New Region', 'campaign-post-type' ),
            'new_item_name'              => __( 'New Region Name', 'campaign-post-type' ),
            'parent_item'                => __( 'Parent Region', 'campaign-post-type' ),
            'parent_item_colon'          => __( 'Parent Region:', 'campaign-post-type' ),
            'all_items'                  => __( 'All Regions', 'campaign-post-type' ),
            'search_items'               => __( 'Search Regions', 'campaign-post-type' ),
            'popular_items'              => __( 'Popular Regions', 'campaign-post-type' ),
            'separate_items_with_commas' => __( 'Separate regions with commas', 'campaign-post-type' ),
            'add_or_remove_items'        => __( 'Add or remove Regions', 'campaign-post-type' ),
            'choose_from_most_used'      => __( 'Choose from the most used Regions', 'campaign-post-type' ),
            'not_found'                  => __( 'No Regions found.', 'campaign-post-type' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_ui'           => true,
            'show_tagcloud'     => true,
            'hierarchical'      => true,
            'rewrite'           => array( 'slug' => 'campaigns/region', 'with_front' => false ),
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true, // required for Gutenberg
        );

        $args = apply_filters( 'campaign_post_type_category_args', $args );

        register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
      */
    }

    /**
     * Customizes the post's permalink
     */
    public function customize_post_permalink($post_link, $post, $leavename, $sample) {
        if ( false !== strpos( $post_link, '%'.$this->taxonomies[0].'%' ) ) {
            //Check for YOAST primary category meta data
            $maybe_yoast = get_post_meta($post->ID,'_yoast_wpseo_primary_'.$this->taxonomies[0],false);
            if( !empty( $maybe_yoast ) ) {
                $primary_term = get_term_by( 'term_id', intval( $maybe_yoast[0] ), $this->taxonomies[0] );
                $slug = $primary_term->slug;
            } else {
                $taxonomies = get_the_terms( $post->ID, $this->taxonomies[0] );
                if ($taxonomies && sizeof($taxonomies) > 0) {
                    $slug = array_pop($taxonomies)->slug;
                } else {
                    $slug = "uncategorized";
                }
            }
            $post_link = str_replace( '%'.$this->taxonomies[0].'%', $slug, $post_link );
        }
        return $post_link;
    }
}