<?php

class MarkInPageTreeConfig extends ModuleConfig{

	// default array for PageDeferredPublish module
	public function getDefaults() {
	    return array(
	      'field' => '',
		  'template' => '',
		  'data_field' => ''
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
    	$f = $this->modules->get('InputfieldTextarea');
    	$f->attr('name', 'field');
    	$f->label = 'Field';
		$f->description = "Mark pages when field is true, add pairs of values on each line delimited by a comma,\ne.g. star, exclusive";
		// add cron option to inputfields
		$inputfields->add($f);


    	$f = $this->modules->get('InputfieldTextarea');
    	$f->attr('name', 'template');
    	$f->label = 'Template';
		$f->description = "Mark pages with specific template, add pairs of values on each line delimited by a comma,\ne.g. plus, basic-page";

		// add textfield to inputfields
		$inputfields->add($f);


    	$f = $this->modules->get('InputfieldTextarea');
    	$f->attr('name', 'data_field');
    	$f->label = 'Data';
		$f->description = "Show field data in page tree list, add a list of fields to show along side its page name,\ne.g. counter \nname";

		// add textfield to inputfields
		$inputfields->add($f);


		// return module config inputs
	    return $inputfields;
  	}
}
