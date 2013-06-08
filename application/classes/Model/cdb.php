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
            'title_cdb' => array(
                array('not_empty'),
                array('min_length', array(':value', 2)),
                array('max_length', array(':value', 250))
            ),
            'year_cdb' => array(
                array('not_empty'),
                array('max_length', array(':value', 4)),
                array('range', array(':value', 2012, 2019))
            ),
            'month_cdb' => array(
                array('not_empty'),
                array('max_length', array(':value', 2)),
                array('range', array(':value', 0, 13))
            ),
            'day_cdb' => array(
                array('not_empty'),
                array('max_length', array(':value', 2)),
                array('range', array(':value', 0, 32))
            ),            
            'address_cdb' => array(
                array('not_empty'),
                array('min_length', array(':value', 2)),
                array('max_length', array(':value', 250))
            ),
            'hour_cdb' => array(
                array('not_empty'),
                array('regex', array(':value', '/^([0-2][0-9]):([0-6][0-9]):([0-6][0-9])$/'))
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

