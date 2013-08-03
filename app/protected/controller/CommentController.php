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
    public function approve(){
        $comment=new CommentModel();
        $comment->isApprove='Yes';
        $comment->id=$_GET['id'];
        $comment->save();
        $blog_id=$comment->getBlogId($_GET['id']);
        $this->redirect('/specific/'.$blog_id);
    }
    public function edit(){
        $comment=new CommentModel();
        $comment_to_edit=$comment->findByCondition(array('id','=',$_GET['id']));
        $this->render('Edit',array('comment'=>$comment_to_edit));
    }
    public function editComment(){
        $comment=new CommentModel();
        $comment->id=$_POST['id'];
        $comment->comment=$_POST['comment'];
        $comment->save();
        $goto='/specific/'.$_POST['blog_id'];
        $this->redirect($goto);
    }
    public function delete(){
        $comment=new CommentModel();
        if($comment->delete(array('id','=',$_GET['id']))==true){
            $this->redirect('/');
        }
        else{
            throw new ApplicationException('Could not delete specified comment');
        }
    }
}