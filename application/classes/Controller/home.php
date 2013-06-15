<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Tmp { 
    
    public function before() {
        parent::before();
    }
    
    public function action_index()
    {   
        /*$oCreateCdb = '';
        
        if($this->template->logged_id !== NULL)
        {
           $oCreateCdb = Request::factory('createcdb')->execute();
        }
            
        $this->template->content = View::factory('home')
                                    ->set('create_cdb', $oCreateCdb);*/
        
        $applicationID = '7838643852314c587376343d';
        $sourceID = '9262544';
        
        // Instancia a classe Apiki_Buscape_API
        $objApikiBuscapeApi = new Apiki_Buscape_API( $applicationID );
 
        // Obtém o retorno do método
        $retorno = simplexml_load_string($objApikiBuscapeApi->findCategoryList(array('categoryId' => '5817')));
        
        print_r($retorno);
    }
    
}