<?php

/**
 * Hello Process Module
 *
 * A starting point skeleton from which to build your own Process module. 
 * Process modules are used primarily for building admin applications and tools.
 * This module also creates a page in the ProcessWire admin to run itself from.
 * 
 * Copyright [year] by [your name]
 *
 * ProcessWire 2.x 
 * Copyright (C) 2014 by Ryan Cramer 
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
	 * This function is executed when a page with your Process assigned is accessed. 
 	 *
	 * This can be seen as your main or index function. You'll probably want to replace
	 * everything in this function. 
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

		// generate some navigation

		$out = 	"
			<h2>$this->greeting</h2>
			<dl class='nav'>
				<dt><a href='./something/'>Do Something</a></dt>
				<dd>Runs the executeSomething() function.</dd>
			</dl>
			";

		return $out;
	}	

	/**
	 * Called when the URL is this module's page URL + "/something/"
	 *
	 */
	public function ___executeSomething() {

		// set a new headline, replacing the one used by our page
		// this is optional as PW will auto-generate a headline 
		$this->headline('This is something!'); 

		// add a breadcrumb that returns to our main page 
		// this is optional as PW will auto-generate breadcrumbs
		$this->breadcrumb('../', 'Hello'); 

		$out = 	"
			<h2>Not much to to see here</h2>
			<p><a href='../'>Go Back</a></p>
			";

		return $out; 
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

