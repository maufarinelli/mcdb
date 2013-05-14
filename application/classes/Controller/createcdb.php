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
            
            $view = View::factory('createcdb')
                    ->set('username', $sFirstname)
                    ->set('cdb', false);
            
            if($_POST && $_POST['cdb_submit'])
            {
                $oCdb = ORM::factory('Cdb');
                $oCdb->fk_user_id = $oUser->user_id;
                $oCdb->titulo_cdb = $_POST['titulo_cdb'];
                $oCdb->data_cdb = $_POST['data_cdb'];
                $oCdb->endereco_cdb = $_POST['endereco_cdb'];
                $oCdb->hora_cdb = $_POST['hora_cdb'];
                $oCdb->template_cdb = $_POST['template_cdb'];
                
                $oCdb->save();
                
                $view->bind('cdb', $oCdb->cdb_id);
                
            }
            
            $this->response->body($view);
        }
        
        
        
    }
}
