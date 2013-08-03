<br>
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
<br>
<br>