<html>
<head>
    <title>
        new blog
    </title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
    <script language="JavaScript" type="text/javascript" src="../../global/openwysiwyg_v1.4.7/scripts/wysiwyg.js"></script>
    <script language="javascript1.2">
        // attach the editor to all textareas of your page.
        // WYSIWYG.attach('all');
        var mysettings = new WYSIWYG.Settings();
        mysettings.ImagesDir = "../../global/openwysiwyg_v1.4.7/images/";
        mysettings.PopupsDir = "../../global/openwysiwyg_v1.4.7/popups/";
        mysettings.CSSFile = "../../global/openwysiwyg_v1.4.7/styles/wysiwyg.css";
        // attach the editor to the textarea with the identifier 'textarea1'.
        WYSIWYG.attach('desc',mysettings);
    </script>
</head>
<body>
    <div class="main">
        <?php $this->useTemplate('head')?>
        <form method="post" action='/Blog/editBlog'>
            <table>
                <tr><th></th> <td> <input type='hidden' name='id' value=<?php echo $this->blogs[0]['id']?>> </td></tr>
                <tr><th>Title : </th> <td> <input type='TEXT' name='title' value='<?php if(isset($this->blogTitle)){ echo $this->blogTitle;} else{
                    echo $this->blogs[0]['title'];
                }?>'>
                    <span class="error"><?php if(in_array('title',$this->error_field)){echo $this->validation_errors['title'][0];}?></span>
                </td></tr>
                <tr><th>Description : </th><td> <textarea cols=25 rows=6 name='desc' id='desc'><?php echo $this->blogs[0]['description']?><?php if(isset($this->desc)){ echo $this->desc;}?></textarea><span class="error"><?php if(in_array('description',$this->error_field)){echo $this->validation_errors['description'][0];}?></span> </td></tr>
                <tr><td></td><td><input type="submit" name='submit' value="Edit"></td> </tr>
            </table>
        </form>
    </div>
</body>
</html>