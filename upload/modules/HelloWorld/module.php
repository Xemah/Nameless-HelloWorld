<?php

/**
 *	HELLO WORLD MODULE
 *	By Xemah | https://xemah.com
 *
**/

class HelloWorldModule extends Module
{
	private $hw_language;
	private $language;
	private $queries;
	private $cache;

	public function __construct($hw_language, $language, $pages, $queries, $cache)
	{
		// Module information
		$name = 'HelloWorld';
		$author = 'Xemah';
		$version = '1.0.0';
		$nameless_version = '2.0.0-pr7';

		// Initialize the module
		parent::__construct($this, $name, $author, $version, $nameless_version);

		// Register module page(s)
		$pages->add($this->getName(), '/hello_world', 'pages/hello_world.php');

		// Assign some variables
		$this->hw_language = $hw_language;
		$this->language = $language;
		$this->queries = $queries;
		$this->cache = $cache;
	}

	public function onInstall()
	{
		// Initialize navigation order
		$this->cache->setCache('navbar_order');
		if (!$this->cache->isCached('hello_world_order')) {
			$this->cache->store('hello_world_order', 100);
		}

		// Initialize navigation icon
		$this->cache->setCache('navbar_icons');
		if (!$this->cache->isCached('hello_world_icon')) {
			$this->cache->store('hello_world_icon', '<i class="icon fas fa-code fa-fw"></i>');
		}
	}

	public function onUninstall()
	{
		// ...
	}

	public function onEnable()
	{
		// ...
	}

	public function onDisable()
	{
		// ...
	}

	public function onPageLoad($user, $pages, $cache, $smarty, $navs, $widgets, $template)
	{
		// Get navigation order
		$cache->setCache('navbar_order');
		$nav_order = $cache->retrieve('hello_world_order');

		// Get navigation icon
		$cache->setCache('navbar_icons');
		$nav_icon = $cache->retrieve('hello_world_icon');

		// Register navigation item
		$navs[0]->add('hello_world', $this->hw_language->get('general', 'title'), URL::build('/hello_world'), 'top', null, $nav_order, $nav_icon);

		// Register module widgets(s)
		if ($widgets) {
			require_once('widgets/hello_world.php');
			$widgets->add(new HelloWorldWidget($this, $widgets, $this->hw_language, $this->$language, $smarty, $cache));
		}
	}
}