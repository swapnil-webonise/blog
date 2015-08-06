<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
</head>
<body>
    <div class="main">
        <?php $this->useTemplate('head')?>
        <h3>User Login</h3>
        <form action="/user/doLogin" name="loginForm" class="formclass" method="post">
            <table>
                <tr>
                    <td><label>Email ID:</label></td>
                    <td>
                        <input type="text" name="txtEmailId" value="<?php if(isset($this->email_id)) echo $this->email_id; ?>"><br><span class="error"><?php if(in_array('email_id',$this->error_field)){echo $this->validation_errors['email_id'][0];}?></span>
                    </td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td>
                        <input type="password" name="txtPassword" value="<?php if(isset($this->password)) echo $this->password; ?>"><span class="error"><br><?php if(in_array('password',$this->error_field)){echo $this->validation_errors['password'][0];}?></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Login"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="/user/forgotPassword">Forgot password ?</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>