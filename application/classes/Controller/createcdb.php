<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Createcdb extends Controller {

    public function action_index()
    {
        $logged = Session::instance()->get('logged');
        $logged_id = Session::instance()->get('logged_id');
        
        if(isset($logged) && isset($logged_id))
        {
            $oUser = ORM::factory('User')
                        ->where('user_id', '=', $logged_id)
                        ->find();
            
            $sFirstname = $oUser->firstname;
            $oCdbId = false;
            $errors = false;
            $aPost = false;
            
            $view = View::factory('createcdb')
                    ->set('username', $sFirstname)
                    ->bind('cdb', $oCdbId)
                    ->bind('errors', $errors)
                    ->bind('aPost', $aPost);
            
            if($_POST && $_POST['cdb_submit'])
            {
                try 
                {
                    $oCdb = ORM::factory('Cdb');
                    
                    $oCdb->fk_user_id = $oUser->user_id;
                    $oCdb->title_cdb = $_POST['title_cdb'];
                   
                    $oCdb->year_cdb = $_POST['year'];
                    $oCdb->month_cdb = $_POST['month'];
                    $oCdb->day_cdb = $_POST['day'];
                    
                    $oCdb->address_cdb = $_POST['address_cdb'];
                    $oCdb->hour_cdb = $_POST['hour'] . ':' . $_POST['minute'] . ':00';
                    $oCdb->template_cdb = $_POST['template_cdb'];

                    if($oCdb->save())
                    {
                        $oCdbId = $oCdb->title_cdb; 
                    }
                }
                catch (ORM_Validation_Exception $e)
                {
                    $errors = $e->errors();
                    $aPost = $_POST;
                }
            }
            
            $this->response->body($view);
        }
        
        
        
    }
}
