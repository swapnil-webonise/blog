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
            <div><b>Owner : </b><?php echo ucfirst($this->user[0]['first_name'].' '.$this->user[0]['last_name']); ?></div>
                    <?php  if($userRole==1 ){?>
                        <?php if($blog['isApprove']=='No'){ ?>
                        <div><b>Status : </b>Not Approved</div>
                        <div><a href=<?php echo '/blog/approve/'.$blog['id'];?>>Approve</a></div>
                            <?php }
                                   else {
                        ?>
                        <div><b>Status : </b>Not Approved</div>
                                   <?php }?>
                        <div><a href=<?php echo '/blog/edit/'.$blog['id'];?>>Edit</a></div>
                        <div><a href=<?php echo '/blog/delete/'.$blog['id']; ?>>Delete</a></div>
                    <? }
                    elseif($userRole==2){?>
                        <div><a href=<?php echo '/blog/approve/'.$blog['id'];?>>Approve</a></div>
                    <?php }
                    else{?>
                        <div><b>Status : </b>Not Approved</div>
                    <?php } ?>

            <div class="blogTitle"><b>Title : </b><?php echo ucfirst($blog['title']);?></div>
            <div class="blogDescription"><b>Description : </b><?php echo html_entity_decode($blog['description']);?></div>
            <table>
                <tr><td></td><td><b>Comments:</b>
                    <table style="width: 500px;">
                        <?php foreach($this->comments as $comment){?>
                        <tr>
                            <td><?php echo ucfirst($comment['first_name'].' '.$comment['last_name']).' : <br>'.$comment['comment']?></td>
                        <td>is Approved:<?php echo $comment['isApprove'];
                            if($userRole==1){?>
                                <a href=<?php echo '/comment/approve/'.$comment['id']; ?>>Approve</a></td>
                                    <td><a href=<?php echo '/comment/edit/'.$comment['id']; ?>>edit</a></td>
                                <td><a href=<?php echo '/comment/delete/'.$comment['id']; ?>>delete</a></td>
                                <?php } ?>
                        </tr>
                        <?php } ?>
                        <tr><td colspan="4"><form action="/Comment/add" method="post">
                            <textarea name='comment' rows="3" cols="30"></textarea>
                            <input type='hidden' name='blog_id' value='<?php echo $blog['id'];?>'>
                            <input type="submit" name="submit" value="comment">
                        </form></td>
                        </tr>
                    </table>
                </td></tr>
            </table>
        </div>


                <?php

                }
                ?>


    </body>
    </html>