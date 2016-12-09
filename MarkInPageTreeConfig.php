<?php

class MarkInPageTreeConfig extends ModuleConfig{

	// default array for PageDeferredPublish module
	public function getDefaults() {
	    return array(
	      'fieldName' => 'exclusive',
		  'templateName' => '',
		  'iconName' => 'certificate'
	    );
	}

	/*
	* getInputfields()
	*
	* return:  $inputfields
	*/

	// create form within PW admin to enable configuration of module
	public function getInputfields() {

		// get module getInputfields set config class
    	$inputfields = parent::getInputfields();

		// get InputfieldText module
		// add fieldname field to settings
    	$f = $this->modules->get('InputfieldText');
    	$f->attr('name', 'fieldName');
    	$f->label = 'Field';
		$f->description = 'Field to check for as true per page in the page tree e.g. checkbox field name';

		// add cron option to inputfields
		$inputfields->add($f);

		// add fieldname field to settings
    	$f = $this->modules->get('InputfieldText');
    	$f->attr('name', 'templateName');
    	$f->label = 'Template';
		$f->description = 'Template name to show icon with the page tree.';

		// add cron option to inputfields
		$inputfields->add($f);

		// add icon name to settings (to display fontawesome icon to user)
    	$f = $this->modules->get('InputfieldText');
    	$f->attr('name', 'iconName');
    	$f->label = 'Icon name';
		$f->description = 'Fontawesome icon to show in page tree – <a href="http://fontawesome.io/icons/">Icon list</a>';
		// add textfield to inputfields
		$inputfields->add($f);

		// return module config inputs
	    return $inputfields;
  	}
}
