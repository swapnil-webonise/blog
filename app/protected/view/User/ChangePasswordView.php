<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
</head>
<body>
    <div class="main">
        <?php $this->useTemplate('head')?>
        <h3>Change Password</h3>
        <form action="/user/doChangePassword" name="loginForm" class="formclass" method="post">
            <table class="tableclass">
                <tr>
                    <td><label>New Password:</label></td>
                    <td>
                        <input type="password" name="txtNewPassword" value="<?php if(isset($this->new_password)) echo $this->new_password; ?>">
                        <br><span class="error"><?php if(in_array('new_password',$this->error_field)){echo $this->validation_errors['new_password'][0];}?></span>
                    </td>
                </tr>
                <tr>
                    <td><label>Confirmed Password:</label></td>
                    <td>
                        <input type="password" name="txtConfirmPassword" value="<?php if(isset($this->confirm_password)) echo $this->confirm_password; ?>">
                        <br><span class="error"><?php if(in_array('confirm_password',$this->error_field)){echo $this->validation_errors['confirm_password'][0];}?></span>
                        <input type="hidden" name="activationCode" value="<?php echo $_GET['activation_code']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Change Password"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>