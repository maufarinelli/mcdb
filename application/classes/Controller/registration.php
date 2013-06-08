<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Registration extends Controller {

    public function action_index()
    {        
        $aErrors = false;
        $aPost = false;
        
        $view = View::factory('registration')
                ->bind('aErrors', $aErrors)
                ->bind('aPost', $aPost);        
        
        if($_POST && $_POST['user_submit'])
        {
            try
            {
                $oUser = ORM::factory('User');
            
                $oUser->firstname   = $_POST['firstname'];
                $oUser->lastname    = $_POST['lastname'];
                $oUser->email       = $_POST['email'];
                $oUser->password    = crypt($_POST['password']);
                $oUser->phone       = isset($_POST['phone']) ? $_POST['phone'] : '';
                $oUser->address     = isset($_POST['address']) ? $_POST['address'] : '';
                $oUser->city        = $_POST['city'];
                $oUser->province    = $_POST['province'];
                $oUser->create_date = date('Y-m-d G:i:s');
                $oUser->update_date = date('Y-m-d G:i:s');
                $oUser->browser     = $_SERVER['HTTP_USER_AGENT'];

                $oUser->save();

                Session::instance()->set('logged_id', $oUser->user_id);
                Session::instance()->set('logged', $oUser->firstname);

                $this->response = Request::factory('home')->execute();
            }
            
            catch (ORM_Validation_Exception $e)
            {
                $aErrors = $e->errors();
                $aPost = $_POST;
            }
        }
        
        $this->response->body($view);
    }

}
