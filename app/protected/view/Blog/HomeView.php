<!doctype html>
<html>
<head>
    <title>
        Blog System
    </title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
</head>
<body>
<a href="#">Home</a>
<a href="/user/loginForm">Login</a>
<a href="/user/registerForm">Register</a>
Filter by title:
<form action="/Blog/filter" method="post">
    <input type="text" name='title'>
    <input type="submit" name="submit" value="search">
</form>
<table border="1" class='table'>
    <?php
    foreach($this->blogs as $blog){
    ?>
    <tr><td><table border="1" style="width: 250px;">
                <tr><td>Title :</td><td><?php echo $blog['title'];?></td></tr>
                <tr><td>Description:</td><td><?php echo substr(html_entity_decode($blog['description']),0,50).'...';?></td></tr>
                <tr><td colspan=2 align='center'><a href=<?php echo '/specific/'.$blog['id']; ?>>read more..</a></td></tr>
            </table>
            <?php

            }
            ?>
        </td></tr>
</table>
</body>
</html>