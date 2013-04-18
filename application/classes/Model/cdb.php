<?php defined('SYSPATH') or die('No direct script access.');

class Model_Cdb extends ORM {
    
    protected $_db = 'default';
    
    protected $_table_name = 'Cdb'; 
    protected $_primary_key = 'cdb_id';
    
    
    // default for $_table_columns: use db introspection to find columns and info
    // see http://v3.kohanaphp.com/guide/api/Database_MySQL#list_columns for all possible column attributes
    protected $_table_columns = array(
        'cdb_id'   => array('data_type' => 'int',    'is_nullable' => FALSE),
        'fk_user_id'   => array('data_type' => 'int',    'is_nullable' => FALSE),
        'titulo_cdb'    => array('data_type' => 'string',    'is_nullable' => FALSE),
        'data_cdb'   => array('data_type' => 'string',    'is_nullable' => FALSE),
        'endereco_cdb'   => array('data_type' => 'string',    'is_nullable' => FALSE),
        'hora_cdb'   => array('data_type' => 'string',    'is_nullable' => FALSE),
        'template_cdb'   => array('data_type' => 'string',    'is_nullable' => FALSE)
    );
 
    // fields mentioned here can be accessed like properties, but will not be referenced in write operations
    /*protected $_ignored_columns = array(
        'helper_field',
    );*/
    
}

