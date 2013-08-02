<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
</head>
<body>
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