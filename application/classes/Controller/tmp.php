<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tmp extends Controller_Template {
    
    public function before()
    {
        parent::before();
        
        if ($this->auto_render)
        {
            // Initialize empty values
            $this->template->title   = 'CDB - ' . $this->request->controller();
            $this->template->content = '';

            $this->template->styles = array();
            $this->template->scripts = array();
            
            $this->template->loginForm = '';
            $this->template->header = '';

        }
    }
    
    public function after()
    {
        if ($this->auto_render)
	{
            $styles = array(
                    /*'media/css/screen.css' => 'screen, projection',
                    'media/css/print.css' => 'print',
                    'media/css/style.css' => 'screen',*/
            );

            $scripts = array(
                    //'http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js',
            );

            $this->template->styles = array_merge( $this->template->styles, $styles );
            $this->template->scripts = array_merge( $this->template->scripts, $scripts );
           
            $this->template->loginForm = Request::factory('login')->execute();
            $this->template->header = View::factory('header')
                                        ->set('login_form', $this->template->loginForm);
	}
        
        parent::after();
    }
    
}
