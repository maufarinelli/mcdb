<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Tmp { 
    
    public function action_index()
    {   
        //$oCreateCdb = '';
        
        if($this->template->logged_id !== NULL)
        {
           $oCreateCdb = Request::factory('createcdb')->execute();
        }
            
        $this->template->content = View::factory('home')
                                    ->bind('create_cdb', $oCreateCdb);
    }
    
}