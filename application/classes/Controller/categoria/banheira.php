<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Categoria_Banheira extends Controller_Tmp { 
    
    public function action_index() {
        
        $applicationID = '7838643852314c587376343d';
        $sourceID = '9262544';
        
        // Instance for Apiki_Buscape_API class
        $objApikiBuscapeApi = new Apiki_Buscape_API( $applicationID );
 
        // Result
        $bathTubs = simplexml_load_string($objApikiBuscapeApi->findCategoryList(array('categoryId' => '5812')));
        
        $this->template->content = View::factory('banheira');
        
    }
    
}