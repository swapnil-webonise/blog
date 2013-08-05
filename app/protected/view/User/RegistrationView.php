<html>
    <head>
        <title>User Registration</title>
        <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
    </head>
    <body>
        <div class="main">
            <?php $this->useTemplate('head')?>
            <h3>Registration Form</h3>

            <form action="/user/doRegister" name="registerForm" class="formclass" method="post">
                <table>
                    <tr>
                        <td><label>First Name:</label></td>
                        <td>
                            <input type="text" name="txtFname" value="<?php if(isset($this->first_name)) echo $this->first_name; ?>"><br><span class="error"><?php if(in_array('first_name',$this->error_field)){echo $this->validation_errors['first_name'][0];}?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Last Name:</label></td>
                        <td>
                            <input type="text" name="txtLname" value="<?php if(isset($this->last_name)) echo $this->last_name; ?>"/><br><span class="error"><?php if(in_array('last_name',$this->error_field)){echo $this->validation_errors['last_name'][0];}?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Email ID:</label></td>
                        <td>
                            <input type="text" name="txtEmailId" value="<?php if(isset($this->email_id)) echo $this->email_id; ?>"><br><span class="error"><?php if(in_array('email_id',$this->error_field)){echo $this->validation_errors['email_id'][0];}?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Password:</label></td>
                        <td>
                            <input type="password" name="txtPassword" value="<?php if(isset($this->password)) echo $this->password; ?>"><br><span class="error"><?php if(in_array('password',$this->error_field)){echo $this->validation_errors['password'][0];}?></span>
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
                            <br><span class="error"><?php if(in_array('user_role_id',$this->error_field)){echo $this->validation_errors['user_role_id'][0];}?></span>
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
        </div>
    </body>
</html>