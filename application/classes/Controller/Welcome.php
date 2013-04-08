<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

    public function action_index()
    {
        //$users = new Model_User;
        $user = ORM::factory('User', 1);

        $view = View::factory('welcome')
                        ->set('nome', $user->email);

        $this->response->body($view);
    }

}
