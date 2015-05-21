<?php

/**
 * Hello Process Module for ProcessWire 2.6.1+
 *
 * A starting point skeleton from which to build your own Process module. 
 * Process modules are used primarily for building admin applications and tools.
 * This module also creates a page in the ProcessWire admin to run itself from.
 *
 * Copyright [year] by [your name]
 *
 * ProcessWire 2.x 
 * Copyright (C) 2015 by Ryan Cramer 
 * Licensed under GNU/GPL v2, see LICENSE.TXT
 * 
 * http://processwire.com
 *
 */

class ProcessHello extends Process {

	/**
	 * This is an optional initialization function called before any execute functions.
	 *
	 * If you don't need to do any initialization common to every execution of this module,
	 * you can simply remove this init() method. 
	 *
	 */
	public function init() {
		parent::init(); // always remember to call the parent init
	}

	/**
	 * This method is executed when a page with your Process assigned is accessed. 
 	 *
	 * This can be seen as your main or index function. You'll probably want to replace
	 * everything in this function. 
 	 *
	 * Return value can either be direct HTML markup, or an associative array of 
	 * varibles to pass to a view file. If using a separate view file, it can be
	 * named any of the following: 
	 *
	 * 1. views/execute.php (this is the one we're using) 
	 * 2. ProcessHello.view.php
	 * 
	 * @return string|array
	 *
	 */
	public function ___execute() {

		// greetingType and greeting are automatically populated to this module
		// and they were defined in ProcessHello.config.php

		if($this->greetingType == 'message') {
			$this->message($this->greeting); 

		} else if($this->greetingType == 'warning') {
			$this->warning($this->greeting); 

		} else {
			$this->error($this->greeting); 
		}

		// send variable(s) to the view file
		return array(
			'subhead' => 'What do you want to do today?',
		);
	}	

	/**
	 * Called when the URL is this module's page URL + "/something/"
	 * 
	 * For this method, we are demonstrate returning markup directly, without
	 * using a separate view file. This is backwards compatible with all 
	 * past versions of ProcessWire (view files required 2.6.1 or newer).
	 * 
	 * @return string|array
	 *
	 */
	public function ___executeSomething() {

		// Set a new headline, replacing the one used by our page.
		// This is optional as PW will auto-generate a headline.
		// We place translatable text in $this->_('...'); or __('...'); 
		// which makes it possible to translate the text into any 
		// other language in the system.
		$this->headline($this->_('This is something (translatable text)')); 

		// Add a breadcrumb that returns to our main page .
		// This is optional as PW will auto-generate breadcrumbs
		$this->breadcrumb('../', $this->_('Hello')); 

		// example values we will include in our output
		$users = $this->users->find('sort=name, limit=50'); 
		
		// Demonstrates using markup (string) as the return value, 
		// rather than a separate view file. 
		return
			"<h2>" . sprintf($this->_('Your system has %d users'), $users->getTotal()) . "</h2>" . 
			"<p>" . $users->implode('<br>', 'name') . "</p>" . 
			"<p><a href='../'>" . $this->_('Go back') . "</a></p>";
	}

	/**
	 * Handles the ./something-else/ URL
	 * 
	 * In this case we are again using a separate view file, like we did
	 * in the execute() method. The view can be named any of the following
	 * (your choice):
	 * 
	 * 1. views/something-else.php (this is the one we're using)
	 * 2. views/execute-something-else.php
	 * 3. ProcessHello-something-else.php
	 * 
	 * @return string|array
	 * 
	 */
	public function ___executeSomethingElse() {
		
		$this->headline($this->_('This is something else!')); 
		
		// send variables to our something-else.php view file:
		return array(
			'numPages' => $this->pages->count(), 
			'newPages' => $this->pages->find("sort=-created, limit=10"),
		);
	}

	/**
	 * Called only when your module is installed
	 *
	 * If you don't need anything here, you can simply remove this method. 
	 *
	 */
	public function ___install() {
		parent::___install(); // always remember to call parent method
	}

	/**
	 * Called only when your module is uninstalled
	 *
	 * This should return the site to the same state it was in before the module was installed. 
	 *
	 * If you don't need anything here, you can simply remove this method. 
	 *
	 */
	public function ___uninstall() {
		parent::___uninstall(); // always remember to call parent method
	}
	
}

