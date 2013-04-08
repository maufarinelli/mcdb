<?php defined('SYSPATH') or die('No direct script access.');

class Model_User extends ORM{
    
    protected $_db = 'default'; // or any db group defined in database configuration
 
    protected $_table_name  = 'User'; // default: accounts
    protected $_primary_key = 'user_id';      // default: id
 
    // default for $_table_columns: use db introspection to find columns and info
    // see http://v3.kohanaphp.com/guide/api/Database_MySQL#list_columns for all possible column attributes
    protected $_table_columns = array(
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
    );
 
    // fields mentioned here can be accessed like properties, but will not be referenced in write operations
    /*protected $_ignored_columns = array(
        'helper_field',
    );*/
        
}