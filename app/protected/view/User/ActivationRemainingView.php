<html>
<head>
    <title>Activation Remaining</title>
    <link rel="stylesheet" type="text/css" href="../../global/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../global/css/main.css">
</head>
<body>
    <div class="main">
        <?php $this->useTemplate('head')?>
        <h3>Registration done successfully!!!</h3>
        Please Verify Your Email ID<br>
        We have send a activation link on following Email Id<br>
        <?php echo $this->userData[0]['email_id']; ?>
    </div>
</body>
</html>