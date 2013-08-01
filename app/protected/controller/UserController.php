<?php
/**
 * Created by JetBrains PhpStorm.
 * User: weboniselab
 * Date: 1/8/13
 * Time: 7:25 PM
 * To change this template use File | Settings | File Templates.
 */

class UserController extends LibController{
    public function index(){

    }

    public function register(){
        $userRoleObj=new UserRoleModel();
        $userRoleArray=$userRoleObj->getAll();
        $this->render('Registration',array("userRoleArray"=>$userRoleArray));
    }

    public function login(){

    }
}