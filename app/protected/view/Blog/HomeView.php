<!doctype html>
<html>
<head>
    <title>
        Blog System
    </title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
    <style>
        a:link {color:blue;}      /* unvisited link */
        a:visited {color:navy;}  /* visited link */
        a:hover {color:#FF00FF;}  /* mouse over link */
        a:active {color:#0000FF;}
        .menu
        {
            padding: 5px 10px;
            text-decoration: none;
            background-color: #d2d2d2;
            border:1px solid #666;
            margin: 2px;
        }
    </style>
</head>
<body>
    <a href="#" class="menu">Home</a>
    <?php
        Application::session()->start();
        if(Application::session()->read('userId')!==null){
    ?>
        <a href="/user/loginForm" class="menu">Logout (<?php echo ucfirst(Application::session()->read('userName')); ?>)</a>
    <?php
        }
        else{
    ?>
        <a href="/user/loginForm" class="menu">Login</a>
        <a href="/user/registerForm" class="menu">Register</a>
    <?php
        }
    ?>

</body>
</html>