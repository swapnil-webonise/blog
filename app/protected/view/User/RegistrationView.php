<html>
    <head>
        <title>User Registration</title>
    </head>
    <body>
    <h3>Registration Form</h3>
    <form action="/user/register" name="registerForm" method="post">
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
                    <input type="text" name="txtEmailId" value="<?php if(isset($_GET['txtEmailId']))  echo $_GET['txtEmailId'];?>">
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
                        <option>Select</option>
                        <?php
                        foreach ($this->userRoleArray as $role) {
                                echo '<option value="'.$role['user_role'].'" >'.$role['user_role'].'</option>';
                        }
                        ?>
                    </select>
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