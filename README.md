# “Hello World” Process Module for ProcessWire

A starting point skeleton from which to build your own Process module. 
Process modules are used primarily for building admin applications and tools
in ProcessWire. This module also creates a page in the ProcessWire admin to 
run itself from. Requires ProcessWire 3.x. 

## What this modules demonstrates

This module demonstrates everything you would need to create a Process module.
It also demonstrates many things that you may not need, but things that are 
still good to know about. 

- How to create an index `execute()` method that are called for your Process
  module’s main/index URL. 
- How to create `executeMethodName()` methods that are automatically called
  when URL segment matches `method-name/`.
- How to return markup from your URL handling methods directly. 
- How to use separate markup “view” files your URL handling methods. 
- How to create message, warning and error notifications in the admin.   
- How to set the admin headline, breadcrumbs and browser `<title>` tag.
- How to define drop-down navigation for your Process module.
- How to create and process a simple form that uses Inputfield modules. 
- How to provide additional submit actions in the form submit button. 
- How to make the Process module configurable. 
- How to provide multi-language translations for the module. 
- And more…


## How to install this module

1. Copy all of the module files to `/site/modules/ProcessHello/`.

2. In your admin, go to Modules > Refresh. 

3. Click “Install” for the “Process > Hello” module (on the “Site” tab). 


## How to test this module

1. Configure the module from the module configuration screen and Save.

3. Click to Setup > Hello.

4. After testing it, open the `.module.php` file in your editor and
   see how it works. Use it as a starting point for your own Process module.

*If in a multi-language environment running ProcessWire 3.0.181 or newer, 
see the “install translations” link in the “Module Information” fieldset,
when on the module configuration screen. Here you can optionally install 
other language translations for the module.* 


## How to use this to make your own Process module

To see exactly what this module does, you may want to install it as-is first. 
Then uninstall and follow the instructions below. 

1. Rename the `ProcessHello.module.php` file to be `ProcessModuleName.module.php`,
   replacing the `ModuleName` portion with your module/class name you wish to use.

2. In the `.module.php` file change the class name at the top to be to be
   `ProcessModuleName`, again replacing the `ModuleName` portion with your own.

3. Edit the `ProcessModuleName.module.php` file to do what you want. In addition:

   - Remove and/or repurpose methods you don’t need. 
   - Remove the `/extras/` dir as it only is there for extra examples.
   - If you don’t want to use separate view files, you can remove the `/views/` dir.
   - If you don’t want to bundle languages you can remove the `/languages/` dir.

4. If your module needs its own CSS and/or JS files, rename those included to be the same as 
   your module name and modify them to do whatever you want. If your module does NOT need 
   CSS and/or JS files then delete them. 

5. Rename the `ProcessHello.info.php` file to `ProcessModuleName.info.php` and edit it,
   updating it specific to your module and information. 

6. If you DO want your module to be configurable:

   - Update the `getModuleConfigInputfields()` method at the botton of the module file. 
   - Update the `$this->set('property', 'value')` statements in the `__construct()`
     method to specify your default configuration values. 
   - Update the phpdoc comments above the class to document your configuration properties.
   
   *Note: If you prefer a separate configuration file, see the example and instructions in the
   `/extras/ProcessHello.config.php` file rather than the steps above.*
   
7. If you DO NOT want your module to be configurable:    

   - Remove the `ConfigurableModule` interface/text from the module’s class definition. 
   - Remove the `getModuleConfigInputfields()` method at the bottom of the module file. 
   - Remove the `$this->set('property', 'value')` statements from the `__construct()` method.
     If that leaves the method blank (other than the parent call) you can just remove the 
     method construct entirely.
   - Remove the phpdoc comments at the top of the class referring to configuration variables.  

8. If you do want to bundle translations of your module for other languages see the section
   after this one. 
   
9. Update this README.md file to contain information specific to your module. 

When you've got something you'd like to share, post your module to GitHub and to 
the ProcessWire modules directory at: <https://processwire.com/modules/>`.


## Bundling multi-language translations with your module   

This requires ProcessWire 3.0.181+ and that you have multi-language support installed.

- Locate the files you want to translate from your admin: Setup > Languages > 
  language > Site files > Find files to translate. Select the file(s) and submit. 
  ProcessWire will generate new empty `.json` files for the files you selected to 
  translate. 
  
- In Setup > Languages > language, click the "edit" link for file(s) added for 
  your module. Translate the text into the desired language and save. Near the top 
  of the translation screen is a link to "Download a CSV file". Click that to save
  the CSV file of translations. 
  
- Copy the CSV file(s) you downloaded in the previous step into a `/languages/` 
  directory in your module’s path. For instance `/site/modules/ProcessHello/languages/`
  is the one you'll see with this module. While not required, I recommend naming 
  your files with the ISO-639-1 language code. For instance, German would be 
  `de.csv`, Spanish would be `es.csv`, Finnish would be `fi.csv`, etc. 

- If your module has multiple translatable files, you can bundle all the translations
  into a single CSV file (just copy and paste into one), or you can have multiple
  `.csv` files for each language. For instance, if this module had both 
  `Helloworld.module` and `ProcessHelloworld.module` files, we might choose to name our 
  csv files `es-main.csv` and `es-process.csv`. Or we could just have an `es.csv` 
  file that merges that translations from both of them. 

- In your module’s documentation, instruct the user to install translations from 
  your module’s info/config screen. It’s in the “Module Information” fieldset 
  “Languages” row, where there is an “install translations” link. When new versions
  of your module also update the translations, make note of that in your changelog
  so that users will know to click the “install translations” again to update
  the translations. 

  
## Other ProcessWire demo modules by Ryan:

- Hello World general module demonstration: <https://processwire.com/modules/helloworld/>
- Fieldtype and Inputfield module demonstration: <https://processwire.com/modules/fieldtype-events/>

Stop by the [ProcessWire forums](https://processwire.com/talk/) anytime and we will be glad 
to help with any questions. 

------
[ProcessWire](https://processwire.com) Copyright 2021 by Ryan Cramer



