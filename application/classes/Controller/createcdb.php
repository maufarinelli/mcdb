<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Createcdb extends Controller {

    public function action_index()
    {
        $logged = Session::instance()->get('logged');
        if(isset($logged))
        {
            $oUser = ORM::factory('User')
                        ->where('user_id', '=', $logged)
                        ->find();
            
            $sFirstname = $oUser->firstname;
            
            $view = View::factory('createcdb')
                ->bind('username', $sFirstname);
            $this->response->body($view);
        }
        
        
    }
}
