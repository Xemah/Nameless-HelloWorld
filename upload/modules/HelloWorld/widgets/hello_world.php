<?php

/**
 *	HELLO WORLD MODULE
 *	By Xemah | https://xemah.com
 *
**/

class HelloWorldWidget extends WidgetBase
{
	private $hw_language;
	private $language;
	private $smarty;

	public function __construct($module, $widgets, $hw_language, $language, $smarty)
	{
		// Widget information
		$this->_name = 'Hello World';
		$this->_description = 'Just a simple hello world widget.';
		$this->_module = $module->getName();
		$this->_location = 'right';
		
		// Initialize the widget
		parent::__construct($widgets->getPages($this->getName()));

		// Set widget order
        $order = DB::getInstance()->query('SELECT `order` FROM nl2_widgets WHERE `name` = ?', [$this->getName()])->first();
		$this->_order = $order->order;
		
		// Assign the variables
		$this->hw_language = $hw_language;
		$this->language = $language;
		$this->smarty = $smarty;
	}

	public function initialise()
	{
		// Widget content
		$this->_content = '
			<h3>Hello World</h3>
			<p>Just a simple hello world widget.</p>
			<small>Widget source:<br /><strong>/modules/HelloWorld/widgets/hello_world.php</strong></small>
		';

		// Display the template (uncomment to use the template)
		// $this->_content = $this->_smarty->fetch('widgets/hello_world.tpl');
	}
}