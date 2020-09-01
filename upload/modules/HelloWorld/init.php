<?php

/**
 *	HELLO WORLD MODULE
 *	By Xemah | https://xemah.com
 *
**/

// Initialize the module language
$hw_language = new Language(__DIR__ . '/language', LANGUAGE);

// Initialize the module
require_once('module.php');
$module = new HelloWorldModule($hw_language, $language, $pages, $queries, $cache);