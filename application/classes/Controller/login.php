<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller {
    
    public function action_index()
    {    
        if($_POST && $_POST['login_submit'])
        {
            $oUser = ORM::factory('User')
                        ->where('email', '=', $_POST['email'])
                        ->find();
            
            if($oUser->user_id == NULL)
            {
                echo 'O email e senha estao incorretos. Tente novamente.';
                $view = View::factory('login');
                $this->response->body($view);
            }
            
            else 
            {
                if($oUser->password == $_POST['password'])
                {
                    Session::instance()->set('logged_id', $oUser->user_id);
                    Session::instance()->set('logged', $oUser->firstname);
                    
                    echo 'entrou ';
                    
                    $this->response->body(Request::factory('home')->execute());
                }
                else
                {
                    echo 'O email e senha estao incorretos. Tente novamente.';
                    $view = View::factory('login');
                    $this->response->body($view);
                }
            }
        }
        
        else
        {
            $view = View::factory('login');
            $this->response->body($view);
        }
    }
    
    
    public function action_logout()
    {
        Session::instance()->delete('logged_id');
        Session::instance()->delete('logged');
        
        $this->response->body(Request::factory('home')->execute());
    }

}
