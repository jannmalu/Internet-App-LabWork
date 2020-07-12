<?php
    include_once 'DBConnector.php';
    include_once 'User.php';

    $connect=new DBConnect;

    if(isset($_POST['btn-login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(user::isPasswordCorrect($username, $password)){
            user::createUserSession($username);
            header("Location:PrivatePage.php");
        }
        else{
            header("Location:Login.php");
        }
    }
?>
<html>
    <head>
        <title>Login Form</title>
        <script type ="text/javascript" src="validate.js"></script>
        <link rel="stylesheet" type="text/css" href="validate.css">
    </head>
    <body>
        <form method="post" name="login" id="login" action="<?=$_SERVER['PHP_SELF']?>">
            <table align="center">
                <tr>
                    <td><input type="text" name="username" placeholder="Enter Username" required></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Enter Password" required></td>
                </tr>
                <tr>
                    <td><button type="submit" name="btn-login"><strong>LOGIN</strong></button></td>
                </tr>
            </table>
        </form>
    </body>
</html>