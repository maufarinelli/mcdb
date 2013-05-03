<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Registration extends Controller {

    public function action_index()
    {        
        $view = View::factory('registration');
        $this->response->body($view);
        
        if($_POST && $_POST['user_submit'])
        {
            $oUser = ORM::factory('User');
            
            $oUser->firstname   = $_POST['firstname'];
            $oUser->lastname    = $_POST['lastname'];
            $oUser->email       = $_POST['email'];
            //$oUser->password    = hash_pbkdf2("sha256", $_POST['password'], 'borasalgar', 1, 20);
            $oUser->password    = $_POST['password'];
            $oUser->phone       = isset($_POST['phone']) ? $_POST['phone'] : '';
            $oUser->address     = isset($_POST['address']) ? $_POST['address'] : '';
            $oUser->city        = $_POST['city'];
            $oUser->province    = $_POST['province'];
            $oUser->create_date = $_SERVER['REQUEST_TIME'];
            $oUser->update_date = $_SERVER['REQUEST_TIME'];
            $oUser->browser     = $_SERVER['HTTP_USER_AGENT'];
            
            $oUser->save();
            
            $request = View::factory('createcdb');
            $this->response->body($request); 
        }
        
        
    }

}
