<?php
    include_once 'DBConnector.php';
    include_once 'User.php';
    include_once 'FileUploader.php';

    $connect = new DBConnect;

    if(isset($_POST['btn-save'])){
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $city_name=$_POST['city_name'];

        $username = $_POST['username'];
        $password=$_POST['password'];

        $utc_timestamp = $_POST['utc_timestamp'];
        $offset = $_POST['time_zone_effect'];

        $user = new User($first_name,$last_name,$city_name,$username,$password,$utc_timestamp,$offset);

        $uploader = new FileUploader();

        if(!$user->validateForm()){
            $user->createFormErrorSessions();
            header("Refresh:0");
            die();
        }

        

        $uploader->uploadFile();
        $target_file = $uploader->target_file;

        $result = $user->save($target_file);

        
        if($result){
            echo "Save Successful";
        }
        else{
            echo "An error occured";
        }
    }

?>
<html>
    <head>
        <title>User Form</title>
        <srcipt src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <srcipt type="text/javascript" src="timezone.js"></script>
        <script type ="text/javascript" src="validate.js"></script>
        <link rel="stylesheet" type="text/css" href="validate.css">
    </head>
    <body>
        <form method="POST" action="<?=$_SERVER['PHP_SELF']?>" onsubmit="return validateForm()" enctype="multipart/form-data" name="user_details" id="user_details">
            <table align="center">
                <tr>
                    <td>
                        <div id="form-errors">
                            <?php
                                session_start();
                                
                                if(!empty($_SESSION['form_errors'])){
                                    echo " " .$_SESSION['form_errors'];
                                    unset($_SESSION['form-errors']);
                                }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="first_name" placeholder="Enter First Name" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="last_name" placeholder="Enter Last Name" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="city_name" placeholder="Enter City Name" required></td>
                </tr>
                <tr>
                    <td><input type="text" name="username" placeholder="Enter Username"required></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Enter Password"required></td>
                </tr>
                <tr>
                    <td>Profile Picture: <input type="file" name="fileToUpload" id="fileToUpload"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
                </tr>

                <input type="hidden" name="utc_timestamp" id="utc_timestamp" value=""/>
                <input type="hidden" name="time_zone_effect" id="time_zone_effect" value=""/>

                <tr>
                    <td><a href="AllRecords.php">All Records</a></td>
                </tr>
                <tr>
                    <td><a href="Login.php">Login</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>