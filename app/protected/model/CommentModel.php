<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 2/8/13
 * Time: 2:16 PM
 * To change this template use File | Settings | File Templates.
 */
class CommentModel extends LibModel{
    public function getall(){
        $this->findAll();
    }
    public function addNew(){
        $this->comment=$_POST['comment'];
        $this->blog_id=$_POST['blog_id'];
        $this->user_id=Application::session()->read('userId');
        $this->save();
    }
}