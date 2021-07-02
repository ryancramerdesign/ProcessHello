<?php namespace ProcessWire;

/**
 * Hello Process Module for ProcessWire 3.x
 *
 * A starting point skeleton from which to build your own Process module. 
 * Process modules are used primarily for building admin applications and tools.
 * This module also creates a page in the ProcessWire admin to run itself from.
 *
 * @property string $greeting Greeting that you'd like to display
 * @property string $greetingType Type of greeting: message|warning|error
 *
 */

class ProcessHello extends Process implements ConfigurableModule {

	/**
	 * Construct
	 * 
	 * Here we set defaults for any configuration settings
	 * 
	 */
	public function __construct() {
		parent::__construct(); // remember to call the parent
		$this->set('greeting', 'Happy hello world to you'); 
		$this->set('greetingType', 'message'); 
	}
	
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
	 * Return value is typically direct HTML markup. But it can also be an associative 
	 * array of variables to pass to a view file named either 'ProcessHello.view.php'
	 * or 'views/execute.php' (demonstrated here). 
	 * 
	 * @return string|array
	 *
	 */
	public function ___execute() {

		if($this->greetingType == 'error') {
			$this->error($this->greeting); 
		} else if($this->greetingType == 'warning') {
			$this->warning($this->greeting); 
		} else {
			$this->message($this->greeting);
		}
		
		// send variable(s) to the view file
		return [
			'subhead' => $this->_('What do you want to do today?'),
			'actions' => [
				'./something/' => $this->_('Something'),
				'./something-else/' => $this->_('Something else'), 
				'./form/' => $this->_('Simple form'), 
			]
		];
	}	

	/**
	 * Called when the URL is this module’s page URL + "/something/"
	 * 
	 * For this method, we are demonstrate returning markup directly, without
	 * using a separate view file (this is much more common). 
	 * 
	 * @return string|array
	 *
	 */
	public function ___executeSomething() {

		// Set a new headline, replacing the one used by our page.
		// This is optional as PW will auto-generate a headline.
		$this->headline($this->_('This is something')); 

		// Add a breadcrumb that returns to our main page .
		// This is optional as PW will auto-generate breadcrumbs
		$this->breadcrumb('../', $this->_('Hello')); 

		// example values we will include in our output
		$users = $this->users->find('sort=name, limit=50'); 
		
		// Demonstrates using markup (string) as the return value, 
		// rather than a separate view file. 
		return
			"<h2>" . sprintf($this->_('Your system has %d users'), $users->getTotal()) . "</h2>" . 
			"<ul>" . $users->each("<li>{name}</li>") . "</ul>";
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

		$pages = $this->wire()->pages;
		
		$this->headline($this->_('This is something else!')); 
		$this->message(sprintf($this->_('There are %d pages in this site'), $pages->count()));
		
		// send variables to our something-else.php view file:
		return [
			'subhead' => $this->_('Here are the last 10 created pages:'), 
			'newPages' => $pages->find("sort=-created, limit=10"),
		];
	}

	/**
	 * Handles the ./form/ URL
	 * 
	 * This is a simple example of creating and processing a form that
	 * uses ProcessWire’s Inputfield modules. 
	 * 
	 * @return string
	 * 
	 */
	public function ___executeForm() {
		
		$modules = $this->wire()->modules;
		$input = $this->wire()->input;
		
		$this->headline($this->_('Here is a simple form')); // the <h1> headline
		$this->browserTitle($this->_('Simple form example')); // The <title> tag

		/** @var InputfieldForm $form */
		$form = $modules->get('InputfieldForm');
		$form->description = $this->_('Please fill this out and submit');

		/** @var InputfieldText $field */
		$field = $modules->get('InputfieldText'); 
		$field->attr('name', 'notice_text'); 
		$field->label = $this->_('Text to display in a notification'); 
		$field->icon = 'file-text-o';
		$field->required = true;
		$form->add($field);

		/** @var InputfieldSubmit $submit */
		$submit = $modules->get('InputfieldSubmit'); 
		$submit->attr('name', 'submit_now'); 
		$submit->val($this->_('Submit now')); 
		$submit->icon = 'smile-o';
		$submit->addActionValue('exit', $this->_('Submit and exit'), 'frown-o'); // after-submit actions
		$submit->addActionValue('pages', $this->_('Submit and go to page list'), 'meh-o');
		$form->add($submit);

		// check if form has been submitted
		if($input->post($submit->name)) $this->processForm($form);
		
		return $form->render();
	}

	/**
	 * Process an Inputfields form and respond to requested submit action
	 * 
	 * @param InputfieldForm $form
	 * 
	 */
	protected function processForm(InputfieldForm $form) {
	
		$input = $this->wire()->input;
		$session = $this->wire()->session;
		$config = $this->wire()->config;
	
		// process the form
		$form->processInput($input->post);
	
		// return now if form had errors
		if(count($form->getErrors())) return;
		
		// no errors: display notification with user’s entered text
		$value = $form->getChildByName('notice_text')->val();
		$this->message($this->_('Your notification text') . " - $value");
	
		/** @var InputfieldSubmit $submit */
		$submit = $form->getChildByName('submit_now');

		// user selected: submit and exit
		if($submit->submitValue === 'exit') $session->redirect('../');

		// user selected: submit and go to page list
		if($submit->submitValue === 'pages') $session->redirect($config->urls->admin);
	}


	/**
	 * Called only when your module is installed
	 *
	 * If you don't need anything here, you can simply remove this method. 
	 *
	 */
	public function ___install() {
		parent::___install(); // Process modules must call parent method
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
		parent::___uninstall(); // Process modules must call parent method
	}

	/**
	 * Get module configuration inputs
	 * 
	 * As an alternative, configuration can also be specified in an external file 
	 * with a PHP array. See an example in the /extras/ProcessHello.config.php file. 
	 * 
	 * @param InputfieldWrapper $inputfields
	 * 
	 */
	public function getModuleConfigInputfields(InputfieldWrapper $inputfields) {
		$modules = $this->wire()->modules;
	
		/** @var InputfieldText $f */
		$f = $modules->get('InputfieldText');
		$f->attr('name', 'greeting');
		$f->label = $this->_('Hello greeting'); 
		$f->description = $this->_('What would you like to say to people using this module?');
		$f->attr('value', $this->greeting); 
		$inputfields->add($f);
	
		/** @var InputfieldRadios $f */
		$f = $modules->get('InputfieldRadios');
		$f->attr('name', 'greetingType');
		$f->label = $this->_('Greeting type'); 
		$f->addOption('message', $this->_('Message'));
		$f->addOption('warning', $this->_('Warning'));
		$f->addOption('error', $this->_('Error'));
		$f->optionColumns = 1; // make it display options on 1 line
		$f->notes = $this->_('Choose wisely'); // like description but appears under field
		$f->attr('value', $this->greetingType);
		$inputfields->add($f);
	}
	
}

