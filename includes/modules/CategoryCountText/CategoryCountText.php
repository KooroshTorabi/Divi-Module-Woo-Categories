<?php

class WCAC_CategoryCountText extends ET_Builder_Module {

	public $slug       = 'wcac_category_count_text';
	public $vb_support = 'on';
	public $product_categories =array();

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => 'Kourosh TorabiJafroudi',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Category Count Text', 'wcac-woo-category-and-count' );
		add_action('wp_enqueue_scripts', array( $this, 'enqueue_select2_for_divi' ) );
	}

	public function get_fields() {
	
		$product_categories = get_terms( 'product_cat', array(
			'orderby'    => 'name',
			'hide_empty' => false,
		) );
		$category_options = array();
		
		if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
			foreach ( $product_categories as $category ) {
				$category_options[ $category->term_id ] = $category->name;
				// $category_options[] = $category->name;
			}
		}
       $opts = array(
		'1' =>"optionx ",
		'2' =>"optionx ",
		'3' =>"optionx ",
		'4' =>"optionx "
	 );
		return array(
			// 'selected_categories' => array(
			// 	'label' => esc_html__( 'Selected Categories', 'et_builder' ),
			// 	'type' => 'categories',
			// 	'option_category' => 'basic_option',
			// 	'description' => esc_html__( 'Select the categories to display.', 'et_builder' ),
			// ),

			// 'selected_categories' => array(
			// 	'label'           => esc_html__( 'Selected Categories', 'et_builder' ),
			// 	'type'            => 'select',
			// 	'option_category' => 'basic_option',
			// 	'options'         => $category_options,
			// 	'description'     => esc_html__( 'Select the categories to display.', 'et_builder' ),
			// 	'multiple'        => true,
			// 	),
			'selected_categories_text' => array(
				'label'           => esc_html__( 'selected categories_text', 'wcac-woo-category-and-count' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'wcac-woo-category-and-count' ),
				// 'toggle_slug'     => 'content',
				// 'tab_slug'		  => 'Content',
			),			
			'selected_categories' => array(
				'label'           => esc_html__( 'Selected Categories', 'et_builder' ),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'options'         => $category_options,
				'description'     => esc_html__( 'Select the categories to display.', 'et_builder' ),
				'multiple'        => true,
				// 'toggle_slug'     => 'content',
				// 'tab_slug'		  => 'Content',
				'ui'              => array(
					'placeholder' => esc_attr__( 'Search categories...', 'et_builder' ),
				),
			),

			// 'options_list' => array(
			// 	'label'           => esc_html__( 'Category List', 'et_builder' ),
			// 	'type'            => 'options_list',
			// 	'tab_slug'        => 'Woocommerce Categories',
			// 	'toggle_slug'     => 'form',
			// ),

			'content' => array(
				'label'           => esc_html__( 'Content', 'wcac-woo-category-and-count' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'wcac-woo-category-and-count' ),
				'toggle_slug'     => 'main_content',
			),
			// `wcac-input-${this.props.name}`
			'selected_categories_select2' => array(
				'label'           => esc_html__( 'Selected Categories(select2)', 'et_builder' ),
				'type'            => 'select2',
				'option_category' => 'basic_option',
				'options'         => $category_options,
				'description'     => esc_html__( 'Select the categories to display.', 'et_builder' ),
				'multiple'        => true,
				// 'toggle_slug'     => 'content',
				// 'tab_slug'		  => 'Content',
				'ui'              => array(
					'placeholder' => esc_attr__( 'Search categories...', 'et_builder' ),
				),
			),


		);
	}
	
	public function enqueue_select2_for_divi() {
		// Enqueue Select2 scripts and styles
		wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array(), '4.0.13');
		wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), '4.0.13', true);
	
		// Enqueue your custom script
		// wp_enqueue_script('custom-script', plugin_dir_url(__FILE__) . 'custom-script.js', array('jquery'), '1.0', true);
	}

	public function render( $attrs, $content = null, $render_slug ) {
        $selected_category = isset($attrs['selected_categories']) ? $attrs['selected_categories'] : '';
        // $selected_category = isset($product_categories[$attrs['selected_categories']]) ? $product_categories[$attrs['selected_categories']] : '';
        // $category_select = isset($attrs['category_select']) ? $attrs['category_select'] : '';
        // Render your module HTML using the selected category text and category select
		// print_r( $this->props);
		// echo "<br><br>";
		// print_r($attrs);
		// echo "<br><br>";
		// echo ' ===> '.$attrs['selected_categories'];
		// echo "<br><br>";
		// print_r($this->product_categories);
		$category_count = 0;
		$category = get_term_by('name', $selected_category, 'product_cat');
		if ($category) {
			$category_count = $category->count;
		}
		// return sprintf( '<div style="display: flex;"><p style="width: 100%; text-align: center;">%1$s%2$s</p><p style="width: 20%; text-align: right;">(%3$s)</p></div>', $this->props['content'], $selected_category, $category_count."" );
		// return sprintf( '<div style="display: flex;"><p style="width: 100%; text-align: center;">%1$s%2$s</p><p style="width: 20%; text-align: right;">(%3$s)</p></div>', $this->props['content'], $selected_category, $category_count."" );
		return '<div  style="position:relative;"> <div style="width:100%"> <p style="text-align:center;">'. $this->props['content']. $selected_category 
			.'</p> </div> <div style="position:absolute;top:-3px;right:0px;"> <p style="padding:3px;border-radius:25px;"> '.$category_count.' </p> </div> </div>' ;
	}
}

new WCAC_CategoryCountText;


