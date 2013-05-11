<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Createcdb extends Controller {

    public function action_index()
    {
        if(isset($this->template->logged) && isset($this->template->logged_id))
        {
            $oUser = ORM::factory('User')
                        ->where('user_id', '=', $logged_id)
                        ->find();
            
            $sFirstname = $oUser->firstname;
            
            $view = View::factory('createcdb')
                ->bind('username', $sFirstname);
            $this->response->body($view);
        }
        
        
    }
}
