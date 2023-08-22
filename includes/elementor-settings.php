<?php

function getElementorView($fileName)
{
	$path = get_template_directory() . '/includes/elementor/views/';
	$filePath = $path . $fileName . '.php';

	return $filePath;
}

function getElementorViewTemp($fileName)
{
	$path = get_template_directory() . '/includes/elementor/templates/';
	$filePath = $path . $fileName . '.php';

	return $filePath;
}

function add_elementor_widget_categories($elements_manager)
{
	$elements_manager->add_category(
		'affsquare-category',
		[
			'title' => esc_html__('Affsquare', 'affsquare'),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action('elementor/elements/categories_registered', 'add_elementor_widget_categories');

function lc_elementor_register_widget($widgets_manager)
{
	$widgets_manager->register(new Affsquare\Team_Widget());
	// $widgets_manager->register(new LC\App_Section_Carousel());
	// $widgets_manager->register(new LC\Apps_Section_List());
	// $widgets_manager->register(new LC\Apps_Section_Grid());
	// $widgets_manager->register(new LC\Categories_Sidebar());
	// $widgets_manager->register(new LC\Apps_List_Sidebar());
	// $widgets_manager->register(new LC\Test());

}
add_action('elementor/widgets/register', 'lc_elementor_register_widget');