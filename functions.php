<?php
/**
 * Affsquare Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Affsquare
 */

define('DS', DIRECTORY_SEPARATOR);

define('THEME_DIR_URI', get_template_directory_uri());

define('THEME_VERSION', 1.0);

require_once 'includes/autoload.php';

use Affsquare\ThemeSetup;
use Affsquare\Assets;

ThemeSetup::instance();
Assets::instance();

require_once 'includes/custom-post-types.php';

require_once 'includes/elementor-settings.php';

require_once 'includes/tgmpa.php';

// Merlin Wizard.
require_once get_parent_theme_file_path('/includes/merlin/vendor/autoload.php');
require_once get_parent_theme_file_path('/includes/merlin/class-merlin.php');
require_once get_parent_theme_file_path('/includes/merlin-config.php');