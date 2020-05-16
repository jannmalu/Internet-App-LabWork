<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:Login.php");
    }
?>
<html>
    <head>
        <title>Private Page</title>
        <script type ="text/javascript" src="validate.js"></script>
        <link rel="stylesheet" type="text/css" href="validate.css">
    </head>
    <body>
        <p>This is a private page</p>
        <p>We want to protect it</p>
        <p><a href="Logout.php">Logout</a></p>
    </body>
</html>