<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weboniselab
 * Date: 23/7/13
 * Time: 2:30 PM
 * To change this template use File | Settings | File Templates.
 */

/**
 * Setting for database configuration
 * Database settings are case sensitive.
 * First five parameters are compulsory.
 * To set collation and charset of the db connection, use the key 'collate' and 'charset'
 * Default PERSISTENT_CONNECTION is false
 * Default COLLATE is utf8_unicode_ci
 * Default DB_DRIVER is mysql
 * Default CHARSET is utf8
 * array('HOST'=>'localhost', 'DATABASE'=>'database', 'USER'=>'root', 'PASSWORD'=>'1234', 'DB_DRIVER'=>'mysql',  'PERSISTENT_CONNECTION'=>true, 'COLLATE'=>'utf8_unicode_ci', 'CHARSET'=>'utf8');
 */

if(isset($config['APP_MODE'])){
    if($config['APP_MODE']=='dev'){
        $db_config = array('HOST'=>'localhost', 'DATABASE'=>'blog_system', 'USER'=>'root', 'PASSWORD'=>'webonise6186', 'DB_DRIVER'=>'mysql',  'PERSISTENT_CONNECTION'=>true);
    }
    else if($config['APP_MODE']=='prod'){
        $db_config = array('HOST'=>'localhost', 'DATABASE'=>'database', 'USER'=>'root', 'PASSWORD'=>'1234', 'DB_DRIVER'=>'mysql',  'PERSISTENT_CONNECTION'=>true);
    }
    else{
        die('Error:Wrong APP_MODE defined');
    }
}
else{
    die('Error:Configure APP_MODE in common.conf.php');
}
?>