<html>
<head>
    <title>Forgot Password Errors</title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
</head>
<body>
<h3>Forgot Password Form Errors</h3>
<table border="1">
    <tr><th>Fields</th><th>Errors</th></tr>
    <?php
    foreach($this->error_field as $field){
        foreach($this->validation_errors[$field] as $val){
            echo '<tr><td>'.$field.'</td><td>'.$val.'</td></tr>';
        }
    }
    ?>
</table>
</body>
</html>