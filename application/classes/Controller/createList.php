<?php defined('SYSPATH') or die('No direct script access.');

class Controller_CreateList extends Controller_Tmp { 
    /**
    * Date and time to cache XML
    * @var Time
    */
    public $now;
    public $lastSave;
    
    
    public $buscapeXML;
            
            
    /**
    * Each subcategory for us 
    *
    * @var array
    */
    public $subBainToilette = ''; // Banho e toilette
    
    public function before() {
        parent::before();
        $this->now = date("U");
    }
    
    public function action_index() {
        
        
        if($this->subBainToilette = Cache::instance()->get('subBainToilette'))
        {
            echo 'CACHE';
        }
        
        else 
        {
            echo 'NOT CACHE';
        }
        
    }
    
}
?>
