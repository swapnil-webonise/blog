<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 24/7/13
 * Time: 3:45 PM
 * To change this template use File | Settings | File Templates.
 */
class BlogController extends LibController{
    public function index(){
        $this->render('Home');
    }
}