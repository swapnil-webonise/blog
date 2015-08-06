<br>
<div class="menubar">
    <div><img src="../../../global/img/Blog_Icon.gif" height="40px" width="40px">&nbsp;&nbsp;&nbsp;<span style="font-weight: bolder;font-size:xx-large; color: #2879BD;padding-right: 100px ">Blog System</span>
<a href="/" class="menu">Home</a>
<?php
Application::session()->start();
if(Application::session()->read('userId')!==null){
    ?>
    <a href="/blog/newBlog" class="menu">New Blog</a>
    <a href="/user/doLogout" class="menu">Logout (<?php echo ucfirst(Application::session()->read('userName')); ?>)</a>

<?php
}
else{
    ?>
    <a href="/user/loginForm" class="menu">Login</a>
    <a href="/user/registerForm" class="menu">Register</a>
<?php
}
?>
    </div   >
</div>
<br>
<br>