<?php

/**
 *	HELLO WORLD MODULE
 *	By Xemah | https://xemah.com
 *
**/

// Define page name
define('PAGE', 'hello_world');

// Set page title
$page_title = $hw_language->get('general', 'title');

// Initialize frontend
require_once(ROOT_PATH . '/core/templates/frontend_init.php');

/* --- */

echo '
	<h1>Hello World</h1>
	<p>Just a simple hello world page.</p>
	<small>Page source:<br /><strong>/modules/HelloWorld/pages/hello_world.php</strong></small>
';

/* --- */

// Load module page(s)
Module::loadPage($user, $pages, $cache, $smarty, [$navigation, $cc_nav, $mod_nav], $widgets);

// Assign page load time
$page_load_time = round(microtime(true) - $start);
define('PAGE_LOAD_TIME', str_replace('{x}', $page_load_time, $language->get('general', 'page_loaded_in')));

// Load page template
$template->onPageLoad();

// Initialize navbar & footer
require_once(ROOT_PATH . '/core/templates/navbar.php');
require_once(ROOT_PATH . '/core/templates/footer.php');

// Display the template (uncomment to use the template)
// $template->displayTemplate('hello_world.tpl', $smarty);