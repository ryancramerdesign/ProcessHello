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
 * 
 * https://processwire.com/to/nmco/
 * https://processwire.com/to/emcwmf/
 *
 * 
 */

$config = array(

	// Text field: greeting
	'greeting' => array(
		'type' => 'text', // type of field (any Inputfield module name)
		'label' => __('Hello Greeting'), // field label
		'description' => __('What would you like to say to people using this module?'), 
		'required' => true, 
		'value' => __('A very happy hello world to you.'), // default value
	),

	// Radio buttons: greetingType
	'greetingType' => array(
		'type' => 'radios', 
		'label' => __('Greeting Type'), 
		'options' => array(
			// options array of value => label
			'message' => __('Message'), 
			'warning' => __('Warning'),
			'error' => __('Error'), 
			),
		'value' => 'warning', // default value
		'optionColumns' => 1, // make options display on one line
		'notes' => __('Choose wisely'), // like description but appears under field
	)
); 
