<?php

class MarkInPageTreeConfig extends ModuleConfig{

	// default array for PageDeferredPublish module
	public function getDefaults() {
	    return array(
	      'selector' => '',
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
    	$f = $this->modules->get('InputfieldSelector');
    	$f->attr('name', 'selector');
    	$f->label = 'Selector';
		$f->description = 'Selector to select marked pages.';

		// add cron option to inputfields
		$inputfields->add($f);

		// add icon name to settings (to display fontawesome icon to user)
    	$f = $this->modules->get('InputfieldIcon');
    	$f->attr('name', 'iconName');
    	$f->label = 'Icon';
		// add textfield to inputfields
		$inputfields->add($f);

		// return module config inputs
	    return $inputfields;
  	}
}
