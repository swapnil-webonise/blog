<?php
/**
 * Created by JetBrains PhpStorm.
 * User: webonise
 * Date: 2/8/13
 * Time: 4:12 PM
 * To change this template use File | Settings | File Templates.
 */
class CommentController extends LibController{
    public function add(){
        $comment=new CommentModel();
        $comment->addNew();
        $goto='/specific/'.$_POST['blog_id'].'';
        $goto='/specific/'.$_POST['blog_id'].'';
        $this->redirect($goto);
    }
}