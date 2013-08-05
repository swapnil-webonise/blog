<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
</head>
<body>
    <div class="main">
        <?php $this->useTemplate('head')?>
        <h3>Forgot Password</h3>
        <form action="/user/doForgotPassword" name="loginForm" class="formclass" method="post">
            <table class="tableclass">
                <tr>
                    <td><label>Email ID:</label></td>
                    <td>
                        <input type="text" name="txtEmailId" value="<?php if(isset($this->email_id)) echo $this->email_id; ?>"><br><span class="error"><?php if(in_array('email_id',$this->error_field)){echo $this->validation_errors['email_id'][0];}?></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Reset"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>