<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller {
    
    public function action_index()
    {     
        
        if($_POST && $_POST['login_submit'])
        {
            $oUser = ORM::factory('User')
                        ->where('email', '=', $_POST['email'])
                        ->find();
            
            if($oUser->password == $_POST['password'])
            {
                $sessionValue = $oUser->user_id;
                Session::instance()->set('logged', $sessionValue);
                
                $this->response = Request::factory('createcdb')->execute();
            }
            
            else 
            {
                echo 'O email e senha estao incorretos. Tente novamente.';
                $view = View::factory('login');
                $this->response->body($view);
            }
            
        }
        
        else
        {
            $view = View::factory('login');
            $this->response->body($view);
        }
        
        
    }

}
