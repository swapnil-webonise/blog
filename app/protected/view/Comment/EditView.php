<html>
<head>
    <title>
        new blog
    </title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
    </head>
<body>
    <div class="main">
        <?php $this->useTemplate('head')?>
        <h3>Edit Comment</h3>
        <form method="post" class="formclass" action='/Comment/editComment'>
            <table>
                <tr hidden><td> <input type='hidden' name='id' value=<?php echo $this->comment[0]['id']?>> </td></tr>
                <tr hidden><td> <input type='hidden' name='blog_id' value=<?php echo $this->comment[0]['blog_id']?>> </td></tr>
                <tr><td>Comment</td><td> <input type='TEXT' name='comment' value=<?php echo $this->comment[0]['comment']?>> </td></tr>
                <tr><td></td><td><input type="submit" name='submit' value="Edit"></td> </tr>
            </table>
        </form>
    </div>
</body>
</html>