<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
</head>
<body>
<h3>User Login</h3>
<form action="/user/doLogin" name="loginForm" method="post">
    <table>
        <tr>
            <td><label>Email ID:</label></td>
            <td>
                <input type="text" name="txtEmailId" >
            </td>
        </tr>
        <tr>
            <td><label>Password:</label></td>
            <td>
                <input type="password" name="txtPassword" >
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
</body>
</html>