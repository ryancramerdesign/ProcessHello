<?php namespace ProcessWire;

/**
 * ProcessHello.info.php
 * 
 * Return information about this module.
 *
 * If you prefer to keep everything in the main module file, you can move this
 * to a static getModuleInfo() method in the ProcessHello.module.php file, which
 * would return the same array as below.
 * 
 * Note that if you change any of these properties for an already installed 
 * module, you will need to do a Modules > Refresh before you see them. 
 *
 */

$info = array(

	// Your module's title
	'title' => 'Hello: Process Module Example', 

	// A 1 sentence description of what your module does
	'summary' => 'A starting point module skeleton from which to build your own Process module.', 

	// Module version number (integer)
	'version' => 2, 

	// Name of person who created this module (change to your name)
	'author' => 'Ryan Cramer', 

	// Icon to accompany this module (optional), uses font-awesome icon names, minus the "fa-" part
	'icon' => 'thumbs-up', 

	// Indicate any requirements as CSV string or array containing [RequiredModuleName][Operator][Version]
	'requires' => 'ProcessWire>=3.0.164', 

	// URL to more info: change to your full modules.processwire.com URL (if available), or something else if you prefer
	'href' => 'https://processwire.com/modules/process-hello/', 

	// name of permission required of users to execute this Process (optional)
	'permission' => 'helloworld', 

	// permissions that you want automatically installed/uninstalled with this module (name => description)
	'permissions' => array(
		'helloworld' => 'Run the HelloWorld module'
	), 
	
	// page that you want created to execute this module
	'page' => array(
		'name' => 'helloworld',
		'parent' => 'setup', 
		'title' => 'Hello World'
	),

	// optional extra navigation that appears in admin drop down menus
	'nav' => array(
		array(
			'url' => '', 
			'label' => 'Hello', 
			'icon' => 'smile-o', 
		), 
		array(
			'url' => 'something/', 
			'label' => 'Something', 
			'icon' => 'beer', 
		),
		array(
			'url' => 'something-else/',
			'label' => 'Something Else',
			'icon' => 'glass',
		),
		array(
			'url' => 'form/',
			'label' => 'Simple form',
			'icon' => 'building',
		),
	)

	// for more options that you may specify here, see the file: /wire/core/Process.php
	// and the file: /wire/core/Module.php

);
