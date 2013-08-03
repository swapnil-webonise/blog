<html>
<head>
    <title>Forgot Password Errors</title>
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
    <h3>Forgot Password Form Errors</h3>
    <table border="1">
        <tr><th>Fields</th><th>Errors</th></tr>
        <?php
        foreach($this->error_field as $field){
            foreach($this->validation_errors[$field] as $val){
                echo '<tr><td>'.ucwords(str_replace('_',' ',$field)).'</td><td>'.ucfirst($val).'</td></tr>';
            }
        }
        ?>
    </table>
</body>
</html>