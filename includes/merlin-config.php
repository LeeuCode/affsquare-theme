<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if (!class_exists('Merlin')) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'directory' => 'includes/merlin',
		// Location / directory where Merlin WP is placed in your theme.
		'merlin_url' => 'lc-wp',
		// The wp-admin page slug where Merlin WP loads.
		'parent_slug' => 'themes.php',
		// The wp-admin parent page slug for the admin menu item.
		'capability' => 'manage_options',
		// The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => false,
		// URL for the 'child-action-link'.
		'dev_mode' => false,
		// Enable development mode for testing.
		'license_step' => false,
		// EDD license activation step.
		'license_required' => false,
		// Require the license activation step.
		'license_help_url' => '',
		// URL for the 'license-tooltip'.
		'edd_remote_api_url' => '',
		// EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name' => '',
		// EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug' => '',
		// EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => site_url(), // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu' => esc_html__('Theme Setup', 'affsquare'),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s' => esc_html__('%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'affsquare'),
		'return-to-dashboard' => esc_html__('Return to the dashboard', 'affsquare'),
		'ignore' => esc_html__('Disable this wizard', 'affsquare'),

		'btn-skip' => esc_html__('Skip', 'affsquare'),
		'btn-next' => esc_html__('Next', 'affsquare'),
		'btn-start' => esc_html__('Start', 'affsquare'),
		'btn-no' => esc_html__('Cancel', 'affsquare'),
		'btn-plugins-install' => esc_html__('Install', 'affsquare'),
		'btn-child-install' => esc_html__('Install', 'affsquare'),
		'btn-content-install' => esc_html__('Install', 'affsquare'),
		'btn-import' => esc_html__('Import', 'affsquare'),
		'btn-license-activate' => esc_html__('Activate', 'affsquare'),
		'btn-license-skip' => esc_html__('Later', 'affsquare'),

		/* translators: Theme Name */
		'license-header%s' => esc_html__('Activate %s', 'affsquare'),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__('%s is Activated', 'affsquare'),
		/* translators: Theme Name */
		'license%s' => esc_html__('Enter your license key to enable remote updates and theme support.', 'affsquare'),
		'license-label' => esc_html__('License key', 'affsquare'),
		'license-success%s' => esc_html__('The theme is already registered, so you can go to the next step!', 'affsquare'),
		'license-json-success%s' => esc_html__('Your theme is activated! Remote updates and theme support are enabled.', 'affsquare'),
		'license-tooltip' => esc_html__('Need help?', 'affsquare'),

		/* translators: Theme Name */
		'welcome-header%s' => esc_html__('Welcome to %s', 'affsquare'),
		'welcome-header-success%s' => esc_html__('Hi. Welcome back', 'affsquare'),
		'welcome%s' => esc_html__('This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'affsquare'),
		'welcome-success%s' => esc_html__('You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'affsquare'),

		'child-header' => esc_html__('Install Child Theme', 'affsquare'),
		'child-header-success' => esc_html__('You\'re good to go!', 'affsquare'),
		'child' => esc_html__('Let\'s build & activate a child theme so you may easily make theme changes.', 'affsquare'),
		'child-success%s' => esc_html__('Your child theme has already been installed and is now activated, if it wasn\'t already.', 'affsquare'),
		'child-action-link' => esc_html__('Learn about child themes', 'affsquare'),
		'child-json-success%s' => esc_html__('Awesome. Your child theme has already been installed and is now activated.', 'affsquare'),
		'child-json-already%s' => esc_html__('Awesome. Your child theme has been created and is now activated.', 'affsquare'),

		'plugins-header' => esc_html__('Install Plugins', 'affsquare'),
		'plugins-header-success' => esc_html__('You\'re up to speed!', 'affsquare'),
		'plugins' => esc_html__('Let\'s install some essential WordPress plugins to get your site up to speed.', 'affsquare'),
		'plugins-success%s' => esc_html__('The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'affsquare'),
		'plugins-action-link' => esc_html__('Advanced', 'affsquare'),

		'import-header' => esc_html__('Import Content', 'affsquare'),
		'import' => esc_html__('Let\'s import content to your website, to help you get familiar with the theme.', 'affsquare'),
		'import-action-link' => esc_html__('Advanced', 'affsquare'),

		'ready-header' => esc_html__('All done. Have fun!', 'affsquare'),

		/* translators: Theme Author */
		'ready%s' => esc_html__('Your theme has been all set up. Enjoy your new theme by %s.', 'affsquare'),
		'ready-action-link' => esc_html__('Extras', 'affsquare'),
		'ready-big-button' => esc_html__('View your website', 'affsquare'),
		'ready-link-1' => sprintf('<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/', esc_html__('Explore WordPress', 'affsquare')),
		'ready-link-2' => sprintf('<a href="%1$s">%2$s</a>', admin_url('customize.php'), esc_html__('Start Customizing', 'affsquare')),
	)
);

/**
 * Define the demo import files (remote files).
 *
 * To define imports, you just have to add the following code structure,
 * with your own values to your theme (using the 'merlin_import_files' filter).
 */
function lc_wizard_import_files()
{
	return array(
		array(
			'import_file_name' => 'Demo Import 1',
			'import_file_url' => 'https://leeucode.site/wp/data/affsquarey/content.xml',
			'import_widget_file_url'     => 'https://leeucode.site/wp/data/affsquarey/widgets.wie',
			'import_customizer_file_url' => 'https://leeucode.site/wp/data/affsquarey/customizer.dat',
			// 'import_preview_image_url'   => 'https://www.example.com/merlin/preview_import_image1.jpg',
			'import_notice' => __('A special note for this import.', 'your-textdomain'),
			'preview_url' => home_url(),
		)
	);
}
add_filter('merlin_import_files', 'lc_wizard_import_files');


/**
 * Execute custom code after the whole import has finished.
 */
function lc_wizard_after_import_setup()
{
	// Assign menus to their locations.
	$main_menu = get_term_by('name', 'Home', 'nav_menu');
	$footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');

	set_theme_mod(
		'nav_menu_locations',
		array(
			'main' => $main_menu->term_id,
			'footer' => $footer_menu->term_id,
		)
	);

}
add_action('merlin_after_all_import', 'lc_wizard_after_import_setup');