    <!doctype html>
    <html>
    <head>
        <title>
            Blog System
        </title>
        <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
    </head>
    <body>
    <div class="main">
        <?php $this->useTemplate('head')?>

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

            <div class="blog">
                <div><img src="../../../global/img/no-user-image.png" width="50px" height="50px"><?php echo ucfirst($this->user[0]['first_name'].' '.$this->user[0]['last_name']); ?></div>
                <br>
                        <?php  if($userRole==1 ){?>
                            <?php if($blog['isApprove']=='No'){ ?>
                            <div><b>Status : </b>Not Approved</div>
                            <div><a href=<?php echo '/blog/approve/'.$blog['id'];?>>Approve</a></div>
                                <?php }
                                       else {
                            ?>
                            <div><b>Status : </b>Approved</div>
                                       <?php }?>
                            <div><a href=<?php echo '/blog/edit/'.$blog['id'];?>>Edit</a></div>
                            <div><a href=<?php echo '/blog/delete/'.$blog['id']; ?>>Delete</a></div>
                        <? }
                        elseif($userRole==2){
                            if($blog['isApprove']=='No'){?>
                            <div><a href=<?php echo '/blog/approve/'.$blog['id'];?>>Approve</a></div>
                        <?php }
                        }
                        else{
                            if($blog['isApprove']=='No'){?>
                            <div><b>Status : </b>Not Approved</div>
                        <?php }
                            else{
                                echo '<div><b>Status : </b>Approved</div>';
                            }
                        }?>
                <br>
                <div class="blogTitle"><?php echo ucfirst($blog['title']);?></div>
                <div class="blogCreatedOn"><?php echo ucfirst($blog['created_on']);?></div>
                <div class="blogDescription"><?php echo html_entity_decode($blog['description']);?></div>
                <table>
                    <tr><td></td><td><b>Comments:</b>
                        <table style="width: 500px;background-color: #f5deb3;">
                            <?php foreach($this->comments as $comment){?>
                            <tr>
                                <?php if($comment['isApprove']=='Yes'||$userRole==1){?>
                                <td><img src="../../../global/img/no-user-image.png" width="50px" height="50px"><?php echo ucfirst($comment['first_name'].' '.$comment['last_name']).' : '.$comment['comment']?></td>
                                <td>
                                <?php }

                                    if($userRole==1){
                                    if($comment['isApprove']=='No'){?>
                                    <a href=<?php echo '/comment/approve/'.$comment['id']; ?>>Approve</a></td><?php } ?>
                                        <td><a href=<?php echo '/comment/edit/'.$comment['id']; ?>>Edit</a></td>
                                    <td><a href=<?php echo '/comment/delete/'.$comment['id']; ?>>Delete</a></td>
                                    <?php } ?>
                            </tr>
                            <?php }
                            if(Application::session()->read('userId')!==null){
                            ?>
                            <tr><td colspan="4"><form action="/Comment/add" method="post">
                                <textarea name='comment' rows="3" cols="30"></textarea>
                                <input type='hidden' name='blog_id' value='<?php echo $blog['id'];?>'>
                                <input type="submit" name="submit" value="comment">
                            </form></td>
                            </tr>
                                <?php
                            }
    ?>
                        </table>
                    </td></tr>
                </table>
            </div>


                    <?php

                    }
                    ?>

    </div>
    </body>
    </html>