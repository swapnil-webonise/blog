<html>
    <head>
        <title>whoops an error has occurred</title>
        <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
        <link rel="stylesheet" type="text/css" href="../../global/css/error.css">
    </head>
    <body>
    <div class="main">
        <?php $this->useTemplate('head')?>
            <h1>Whoops an error has occurred.</h1>
            <img src="../../global/img/error_by_charmingice-d47894f.png" height="75" width="200"><br><br>
            <label><?php echo $this->msg;?></label>
            <h4>File Name:</h4>
            <label><?php echo $this->file_name;?></label>
            <h4>Line No:</h4>
            <label><?php echo $this->line_no;?></label>
    </div>
    </body>
</html>

