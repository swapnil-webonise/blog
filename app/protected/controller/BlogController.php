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
        $this->render('home');
    }
    public function home(){

        $blog=new BlogModel();
        $blogs=$blog->getAll();
        $this->render('Home',array('blogs'=>$blogs));

    }
    public function newBlog(){
        $this->render('create');
    }
    public function createBlog(){
        $blog=new BlogModel();
        $blog->title=$_POST['title'];
        $blog->description=$_POST['desc'];
        $blog->user_id=Application::session()->read('userId');
        $blog->encode();
        $blog->save();
    }
    public function filter(){
        $blog=new BlogModel();
        if(isset($_POST['submit'])){
            $blogs=$blog->findByCondition(array('title','=',$_POST['title']));
            $this->render('Home',array('blogs'=>$blogs));
        }
    }
    public function specific(){
        $userId=Application::session()->read('userId');
        $userRole=Application::session()->read('userRole');
        $blog=new BlogModel();
        $user=new UserModel();
        if(isset($_GET['id'])){
            $blogs=$blog->findByCondition(array('id','=',$_GET['id']));
            $queryString="select c.comment,c.isApprove,u.first_name,u.last_name from comment c,user u where c.user_id=u.id and c.blog_id=".$_GET['id'];
            $comments=$blog->query($queryString);
            $this->render('Specific',array('blogs'=>$blogs,'comments'=>$comments,'userId'=>$userId,'userRole'=>$userRole));
        }
    }
}