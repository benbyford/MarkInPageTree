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
        
        /* @var InputfieldAsmSelect $f */
        $f = $this->modules->InputfieldAsmSelect;
        $f_name = 'allowed_roles';
        $f->name = $f_name;
        $f->label = $this->_('Roles that may view changes to the Page Tree');
        $f->description = $this->_('Leave this empty to enable module for all roles.');
        $roles = $this->roles->find("name!=guest");
        foreach($roles as $select_option) {
          $f->addOption($select_option->name);
        }
        $f->value = $this->$f_name;
        $inputfields->add($f);


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