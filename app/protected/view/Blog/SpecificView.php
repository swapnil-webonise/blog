<!doctype html>
<html>
<head>
    <title>
        Blog System
    </title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
</head>
<body>
<a href="/home">Home</a>
<a href="/user/loginForm">Login</a>
<a href="/user/registerForm">Register</a>

    <?php
    Application::session()->start();
    if(Application::session()->read('userId')!==null){
        $userRole=Application::session()->read('userRole');
    }
    else{
        $userRole=3;
    }
    foreach($this->blogs as $blog){
    ?>
        Owner:<?php echo $this->user[0]['first_name'].' '.$this->user[0]['last_name']?>
        <table border="1" style="width: 500px;">
            <tr><td><?php echo $this->user[0]['first_name'].' '.$this->user[0]['last_name']?></td></tr>
                <?php  if($userRole==1 ){?>
                <tr><td colspan="2">Status:Not Approved</td>
                    <?php if($blog['isApprove']=='No'){ ?>
                    <td><a href=<?php echo '/blog/approve/'.$blog['id'];?>>Approve</a></td>
                        <?php }?>
                    <td><a href=<?php echo '/blog/edit/'.$blog['id'];?>>edit</a></td>
                    <td><a href=<?php echo '/blog/delete/'.$blog['id']; ?>>delete</a></td>
                </tr>
                <? }
                elseif($userRole==2){?>
                 <tr><td><a href=<?php echo '/blog/approve/'.$blog['id'];?>>Approve</a></td></tr>
                <?php }
                else{?>
                    <tr><td colspan="2">Status:Approved</td></tr>
                <?php } ?>
                </table>
                <table border="1">
                <tr><td>Title :</td><td><?php echo $blog['title'];?></td></tr>
                <tr><td>Description:</td><td><?php echo html_entity_decode($blog['description']);?></td></tr>
                <tr><td colspan=2 align='center'>Comments:
                        <table border="1" style="width: 500px;">
                            <?php foreach($this->comments as $comment){?>
                            <tr>
                                <td><?php echo $comment['first_name'].' '.$comment['last_name'].' Says : '.$comment['comment']?></td>
                                <td>is Approved:<?php echo $comment['isApprove'];
                                    if($userRole==1){?>
                                    <a href=<?php echo '/comment/approve/'.$comment['id']; ?>>Approve</a></td>
                                <td><a href=<?php echo '/comment/edit/'.$comment['id']; ?>>edit</a></td>
                                <td><a href=<?php echo '/comment/delete/'.$comment['id']; ?>>delete</a></td>
                                    <?php } ?>
                            </tr>
                            <?php } ?>
                            <tr><td colspan="4"><form action="/Comment/add" method="post">
                                        <input type="text" name='comment'>
                                        <input type='hidden' name='blog_id' value='<?php echo $blog['id'];?>'>
                                        <input type="submit" name="submit" value="comment">
                                    </form></td>
                            </tr>
                        </table>
                </td></tr>
            </table>
            <?php

            }
            ?>


</body>
</html>