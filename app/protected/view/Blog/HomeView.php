<!doctype html>
<html>
<head>
    <title>
        Blog System
    </title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
</head>
<body>
    <br>
    <a href="/" class="menu">Home</a>
    <?php
        Application::session()->start();
        if(Application::session()->read('userId')!==null){
    ?>
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
    <br><br>
    <form action="/Blog/filter" method="post">
        Filter by title:
        <input type="text" name='title'>
        <input type="submit" name="submit" value="search">
    </form>
    <table border="1" class='table'>
        <?php
        foreach($this->blogs as $blog){
        if($blog['isApprove']=='Yes'||$this->userRole===1){
        ?>
        <tr><td><table border="1" style="width: 250px;">
                    <tr><td>Title :</td><td><?php echo $blog['title'];?></td></tr>
                    <tr><td>Description:</td><td><?php echo substr(html_entity_decode($blog['description']),0,50).'...';?></td></tr>
                    <tr><td colspan=2 align='center'><a href=<?php echo '/specific/'.$blog['id']; ?>>read more..</a></td></tr>
                </table>
                <?php

                }
                }
                ?>
            </td></tr>
    </table>
</body>
</html>