<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weboniselab
 * Date: 3/8/13
 * Time: 3:45 PM
 * To change this template use File | Settings | File Templates.
 */

if(file_exists('./protected/config/common.conf.php')){
    require_once './protected/config/common.conf.php';

    if($config['CONFIG_PATH']=== $config['APP_PATH'].'protected/config/'){
        require_once require_file('Application.php');
        require_once require_file('routes.conf.php');
        require_once require_file('db.conf.php');
    }
    else{
        die('Your config path should be '.$config['APP_PATH'].'protected/config/');
    }
}

function require_file($file_name){
    global $config;
    $file_extension =getFileExtension($file_name);
    if($file_extension==='php'){
        $sub_extension=getFileExtension(substr($file_name,0,strlen($file_name)-4));
        if($sub_extension==='conf'){
            return $config['CONFIG_PATH'].$file_name;
        }
        else{
            if($file_name==='Application.php'){
                return $config['LIB_PATH'].$file_name;
            }
        }
    }
    else{
        die('Extension of '.$file_name.' should be php');
    }
}

function getFileExtension($file_name){
    return substr($file_name, strrpos($file_name, '.')+1);
}

function initiate_application(){
    global $config;
    global $db_config;
    global $route;

    Application::conf()->setConfiguration($config);

    Application::db()->setConfiguration($db_config);

    Application::setRouting($route);
}