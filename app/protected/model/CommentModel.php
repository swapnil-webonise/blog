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
    public function getCommentOfBlog($blog_id){
        $userId=Application::session()->read('userId');
        $comments=$this->findByCondition(array(array('blog_id','=',$blog_id),'and',array(array('isApprove','=','Yes'),'or',array('user_id','=',$userId))));
        return $comments;
    }
    public function delete($condition){
        $data=$this->findByCondition($condition);
        if(!empty($data)){
            if($this->deleteData($condition)>0){
                return true;
            }
            return false;
        }
        return false;
    }

}