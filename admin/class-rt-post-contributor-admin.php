<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rajanvijayan.com
 * @since      1.0.0
 *
 * @package    Rt_Post_Contributor
 * @subpackage Rt_Post_Contributor/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rt_Post_Contributor
 * @subpackage Rt_Post_Contributor/admin
 * @author     Rajan Vijayan <rajanit2000@gmail.com>
 */
class Rt_Post_Contributor_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rt-post-contributor-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rt-post-contributor-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register metabox for contributors list.
	 *
	 * @since    1.0.0
	 */
	public function add_post_metabox() {
		add_meta_box( 'contributor_meta_box', __( 'Contributor Details' ), array( $this, 'show_contributor_meta_box' ), 'post', 'advanced', 'low' );
	}

	/**
	 * Show the metabox for contributors list.
	 *
	 * @since    1.0.0
	 * @param    int    $post    The post ID.
	 */
	public function show_contributor_meta_box( $post ) {
		$blogusers = get_users(); 
		$contributors = get_post_meta( $post->ID, 'contributor', true );
		?>
		<div class="rt-user-list">
		<?php foreach ( $blogusers as $user ) { ?>
			<div class="user-data">
				<input id="rt-user-<?php echo $user->ID;?>" class="rt-user" type="checkbox" name="meta[contributor][]" value="<?php echo $user->ID;?>" <?php if( in_array( $user->ID, $contributors ) ){?> checked="" <?php }?> />
				<label for="rt-user-<?php echo $user->ID;?>"><?php  echo esc_html( $user->user_nicename );?></label>
			</div>
		<?php } ?>
		</div>
		<?php 
	}

	/**
	 * Insert contributors details in post meta value.
	 *
	 * @since    1.0.0
	 * @param    int    $post_id    The post ID.
	 */
	public function save_contributor_details( $post_id ) {
		if ( get_post_type( $post_id ) == 'post' ) {
			if ( isset( $_POST['meta'] ) ) {
				foreach( $_POST['meta'] as $key => $value ){
					update_post_meta( $post_id, $key, $value );
				}
			}
		}
	}

}
