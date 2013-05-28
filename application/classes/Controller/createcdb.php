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
                    $oCdb->titulo_cdb = $_POST['titulo_cdb'];
                    
                    $_POST['ano'] >= date('Y') ? $_POST['ano'] : '';
                    $_POST['mes'] >= 1 || $_POST['mes'] <= 12 ? $_POST['mes'] : '';
                    $_POST['dia'] >= 1 || $_POST['dia'] <= 31 ? $_POST['dia'] : '';
                    $oCdb->data_cdb = $_POST['ano'] . '-' . $_POST['mes'] . '-' . $_POST['dia'];
                    
                    $oCdb->endereco_cdb = $_POST['endereco_cdb'];
                    $oCdb->hora_cdb = $_POST['hora'] . ':' . $_POST['minuto'] . ':00';
                    $oCdb->template_cdb = $_POST['template_cdb'];

                    if($oCdb->save())
                    {
                        $oCdbId = $oCdb->titulo_cdb; 
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
