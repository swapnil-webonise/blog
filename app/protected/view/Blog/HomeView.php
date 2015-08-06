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
        <form action="/Blog/filter" method="post">
            <caption>Filter by title:</caption>
            <input type="text" name='title' style="height: 20px;">
            <input type="submit" name="submit" value="search">
        </form>

        <?php
        if(Application::session()->read('userId')!==null){
          $userRole=Application::session()->read('userRole');
        }
        else{
            $userRole=3;
        }
        foreach($this->blogs as $blog){
        if($blog['isApprove']=='Yes'){
        ?>
            <div class="blog">
                <div class="blogTitle"><?php echo ucfirst($blog['title']);?></div>
                <div class="blogCreatedOn"><?php echo ucfirst($blog['created_on']);?></div>
                <div class="blogDescription"><?php echo substr(html_entity_decode($blog['description']),0,50).'...';?></div>
                <div class="readMore"><a href=<?php echo '/specific/'.$blog['id']; ?>>Read more</a></div>
            </div>
        <?php
        }
            if($blog['isApprove']=='No'&& ($userRole==1||$userRole==2||$userId===$blog['user_id'])){
                    ?>
            <div class="blog">
                <div class="blogTitle"><?php echo ucfirst($blog['title']);?></div>
                <div class="blogCreatedOn"><?php echo ucfirst($blog['created_on']);?></div>
                <div class="blogDescription"><?php echo substr(html_entity_decode($blog['description']),0,50).'...';?></div>
                <div class="readMore"><a href=<?php echo '/specific/'.$blog['id']; ?>>Read more</a></div>
            </div>
        <?php
        }
        }
                ?>
    </div>
</body>
</html>