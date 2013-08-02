<html>
<head>
    <title>
        new blog
    </title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
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
<form method="post" action='/Blog/createBlog'>
<table>
    <tr><th>Title : </th> <td> <input type='TEXT' name='title'> </td></tr>
    <tr><th>Description : </th></tr>
    <tr><th></th><td> <textarea cols=25 rows=6 name='desc' id='desc'></textarea> </td></tr>
    <tr><th>tags : </th> <td> <input type='TEXT' name='tag'> </td></tr>
    <tr><td colspan="2" align='center'><input type="submit" name='submit' value="Create"></td> </tr>
</table>
</form>
</body>
</html>