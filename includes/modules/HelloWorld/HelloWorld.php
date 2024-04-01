<?php

class WCAC_HelloWorld extends ET_Builder_Module {

	public $slug       = 'wcac_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'http://www.kouroshtorabi.ir',
		'author'     => 'Kourosh TorabiJafroudi',
		'author_uri' => 'http://KouroshTorabi.com/about',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'wcac-woo-category-and-count' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'wcac-woo-category-and-count' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'wcac-woo-category-and-count' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new WCAC_HelloWorld;
