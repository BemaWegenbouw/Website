<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../assets/favicon.ico">

        <title>Bema Wegenbouw BV - Staff Login</title>

        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/noty/themes/noty-theme.js"></script>
        <script type="text/javascript" src="../assets/js/noty/packaged/jquery.noty.packaged.min.js"></script>
        
        <!-- Custom styles for this template -->
        <link href="../assets/css/signin.css" rel="stylesheet">
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
    
<?php
if(isset($_SESSION["login-error"])) {
    $loginerror = $_SESSION["login-error"];
    print("<script type='text/javascript'>noty({text: '$loginerror', type: 'error', layout: 'top', theme: 'relax', timeout: 10000});</script>");
    unset($_SESSION["login-error"]);
}
?>
        
    <?php if(isset($_SESSION["uid"]) && !empty($_SESSION["uid"])) { ?>
    
        JE BENT INGELOGD! HEADER HIER!
        
    <?php } ?>