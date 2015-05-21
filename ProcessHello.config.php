<?php

/**
 * Configure the Hello World module
 *
 * This type of configuration method requires ProcessWire 2.6 or newer.
 * For backwards compatibility with older versions of PW, you'll want to
 * instead want to look into the getModuleConfigInputfields() method, which
 * is specified with the .module file.
 *
 * For more about configuration methods, see here: 
 * https://processwire.com/blog/posts/new-module-configuration-options/
 * https://processwire.com/blog/posts/processwire-core-updates-2.5.27/#expanded-module-configuration-options-within-module-file
 *
 * 
 */

$config = array(

	// Text field: greeting
	'greeting' => array(
		'type' => 'text', // type of field (any Inputfield module name)
		'label' => $this->_('Hello Greeting'), // field label
		'description' => $this->_('What would you like to say to people using this module?'), 
		'required' => true, 
		'value' => $this->_('A very happy hello world to you.'), // default value
	),

	// Radio buttons: greetingType
	'greetingType' => array(
		'type' => 'radios', 
		'label' => $this->_('Greeting Type'), 
		'options' => array(
			// options array of value => label
			'message' => $this->_('Message'), 
			'warning' => $this->_('Warning'),
			'error' => $this->_('Error'), 
			),
		'value' => 'warning', // default value
		'optionColumns' => 1, // make options display on one line
		'notes' => $this->_('Choose wisely'), // like description but appears under field
	)
); 
