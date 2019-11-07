<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://rajanvijayan.com
 * @since      1.0.0
 *
 * @package    Rt_Post_Contributor
 * @subpackage Rt_Post_Contributor/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Rt_Post_Contributor
 * @subpackage Rt_Post_Contributor/public
 * @author     Rajan Vijayan <rajanit2000@gmail.com>
 */
class Rt_Post_Contributor_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rt_Post_Contributor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rt_Post_Contributor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rt-post-contributor-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Rt_Post_Contributor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rt_Post_Contributor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rt-post-contributor-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Insert the contributors details after post content.
	 *
	 * @since    1.0.0
	 * @param    string    $content    The existing post content.
	 */
	public function insert_contributors_after_post( $content ){
		if (is_single()) {
			$content .= '<h3>' .__( 'Contributors' ). '</h3>';
			
			$contributors = get_post_meta( get_the_ID(), 'contributor', true );
			foreach ( $contributors as $user ) { 
				$content .= '<div class="contributor-box">
					'. get_avatar( $user ) .'
					<h4><a href="'.get_author_posts_url( $user ).'">'.get_the_author_meta( 'display_name', $user ).'</a></h4>
				</div>';
			}
		}
		return $content;
	}

}