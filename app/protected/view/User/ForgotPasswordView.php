<html>
<head>
    <title>Forgot Password</title>
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
    <h3>Forgot Password</h3>
    <form action="/user/doForgotPassword" name="loginForm" method="post">
        <table>
            <tr>
                <td><label>Email ID:</label></td>
                <td>
                    <input type="text" name="txtEmailId" >
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Reset"></td>
            </tr>
        </table>
    </form>
</body>
</html>