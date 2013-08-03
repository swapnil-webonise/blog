<html>
<head>
    <title>
        new blog
    </title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
    </head>
<body>
<form method="post" action='/Comment/editComment'>
    <table>
        <tr hidden><td> <input type='hidden' name='id' value=<?php echo $this->comment[0]['id']?>> </td></tr>
        <tr hidden><td> <input type='hidden' name='blog_id' value=<?php echo $this->comment[0]['blog_id']?>> </td></tr>
        <tr> <td> <input type='TEXT' name='comment' value=<?php echo $this->comment[0]['comment']?>> </td></tr>
        <tr><td colspan="2" align='center'><input type="submit" name='submit' value="Edit"></td> </tr>
    </table>
</form>
</body>
</html>