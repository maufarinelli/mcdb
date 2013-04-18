<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends ORM{
    
    protected $_db = 'default'; // or any db group defined in database configuration
 
    protected $_table_name  = 'User';
    protected $_primary_key = 'user_id';
    
    protected $_has_many = array(
        'cdb' => array(
            'model' => 'Cdb',
            'foreign_key'=> 'fk_user_id'
        )
    );
    
    public function rules(){
        
        return array(
            'firstname' => array(
                array('not_empty'),
                array('min_length', array(':value', 4)),
                array('max_length', array(':value', 100))
            ),
            'lastname' => array(
                array('not_empty'),
                array('min_length', array(':value', 4)),
                array('max_length', array(':value', 100))
            ), 
            'email' => array(
                array('not_empty'),
                array('min_length', array(':value', 4)),
                array('max_length', array(':value', 50))
            ),
            'password' => array(
                array('not_empty'),
                array('min_length', array(':value', 4)),
                array('max_length', array(':value', 50))
            ),
            'phone' => array(
                array('max_length', array(':value', 15))
            ),
            'address' => array(
                array('max_length', array(':value', 250))
            ),
            'city' => array(
                array('not_empty'),
                array('min_length', array(':value', 2)),
                array('max_length', array(':value', 100))
            ),
            'province' => array(
                array('not_empty'),
                array('length', array(':value', 2))
            ),
            'create_date' => array(
                array('not_empty')
            ),
            'update_date' => array(
                array('not_empty')
            ),
            'browser' => array(
                array('not_empty'),
                array('min_length', array(':value', 2)),
                array('max_length', array(':value', 250))
            ),
        );
        
    }
    
    public function filters(){
        
    }
 
    // default for $_table_columns: use db introspection to find columns and info
    // see http://v3.kohanaphp.com/guide/api/Database_MySQL#list_columns for all possible column attributes
    /*protected $_table_columns = array(
        'user_id'   => array('data_type' => 'int',    'is_nullable' => FALSE),
        'firstname'   => array('data_type' => 'string',    'is_nullable' => FALSE),
        'lastname'    => array('data_type' => 'string',    'is_nullable' => FALSE),
        'email'   => array('data_type' => 'string',    'is_nullable' => FALSE),
        'password'   => array('data_type' => 'string',    'is_nullable' => FALSE),
        'phone'   => array('data_type' => 'string',    'is_nullable' => TRUE),
        'address'   => array('data_type' => 'string',    'is_nullable' => TRUE),
        'city'   => array('data_type' => 'string',    'is_nullable' => FALSE),
        'province'   => array('data_type' => 'string',    'is_nullable' => FALSE),
        'create_date'   => array('data_type' => 'string',    'is_nullable' => FALSE),
        'update_date'   => array('data_type' => 'string',    'is_nullable' => FALSE),
        'browser'  => array('data_type' => 'string', 'is_nullable' => FALSE),
    );*/
 
    // fields mentioned here can be accessed like properties, but will not be referenced in write operations
    /*protected $_ignored_columns = array(
        'helper_field',
    );*/
        
}