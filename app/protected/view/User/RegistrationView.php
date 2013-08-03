<html>
    <head>
        <title>User Registration</title>
        <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
    </head>
    <body>
    <br>
    <?php $this->useTemplate('head')?>
    <h3>Registration Form</h3>
    <form action="/user/doRegister" name="registerForm" method="post">
        <table>
            <tr>
                <td><label>First Name:</label></td>
                <td>
                    <input type="text" name="txtFname" />
                </td>
            </tr>
            <tr>
                <td><label>Last Name:</label></td>
                <td>
                    <input type="text" name="txtLname" />
                </td>
            </tr>
            <tr>
                <td><label>Email ID:</label></td>
                <td>
                    <input type="text" name="txtEmailId">
                </td>
            </tr>
            <tr>
                <td><label>Password:</label></td>
                <td>
                    <input type="password" name="txtPassword" >
                </td>
            </tr>
            <tr>
                <td><label>User Role:</label></td>
                <td>
                    <select name="comboUserRole">
                        <option value="">Select</option>
                        <?php
                        foreach ($this->userRoleArray as $role) {
                                echo '<option value="'.$role['id'].'" >'.$role['user_role'].'</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Gender:</label></td>
                <td>
                    <input type="radio" name="gender" value="Male" checked="checked">&nbsp;Male&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Female" >&nbsp;Female
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Register"></td>
            </tr>
        </table>
    </form>
    </body>
</html>