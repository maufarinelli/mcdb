<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$query = DB::select('id', 'firstname')->from('User');
		$view = View::factory('welcome')
				->set('nome', $query);
		$this->response->body($view);
		
	}

}
