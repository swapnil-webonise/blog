<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
</head>
<body>
    <?php $this->useTemplate('head')?>
    <h3>Change Password</h3>
    <form action="/user/doChangePassword" name="loginForm" method="post">
        <table>
            <tr>
                <td><label>New Password:</label></td>
                <td>
                    <input type="password" name="txtNewPassword" >
                </td>
            </tr>
            <tr>
                <td><label>Confirmed Password:</label></td>
                <td>
                    <input type="password" name="txtConfirmPassword" >
                    <input type="hidden" name="activationCode" value="<?php echo $_GET['activation_code']; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Change Password"></td>
            </tr>
        </table>
    </form>
</body>
</html>