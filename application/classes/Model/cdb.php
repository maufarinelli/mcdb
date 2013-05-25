<?php defined('SYSPATH') or die('No direct script access.');

class Model_Cdb extends ORM {
    
    protected $_db = 'default';
    
    protected $_table_name = 'Cdb'; 
    protected $_primary_key = 'cdb_id';
    
    public function rules(){
        
        return array(
            'fk_user_id' => array(
                array('not_empty'),
                array('max_length', array(':value', 7))
            ),
            'titulo_cdb' => array(
                array('not_empty'),
                array('min_length', array(':value', 2)),
                array('max_length', array(':value', 250))
            ),
            'data_cdb' => array(
                array('not_empty')
            ),
            'endereco_cdb' => array(
                array('not_empty'),
                array('min_length', array(':value', 2)),
                array('max_length', array(':value', 250))
            ),
            'hora_cdb' => array(
                array('not_empty')
            ),
            'template_cdb' => array(
                array('not_empty'),
                array('max_length', array(':value', 2))
            )
        );        
    }
    
    // fields mentioned here can be accessed like properties, but will not be referenced in write operations
    /*protected $_ignored_columns = array(
        'helper_field',
    );*/
    
}

