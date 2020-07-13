<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:Login.php");
    }

    include_once "DBConnector.php";
    $con = new DBConnect();

    $username = $_SESSION['username'];

    $sql = "SELECT id FROM user WHERE username = '$username'";
    $res = mysqli_query($con->conn, $sql) or die("Error ".mysqli_error($con->conn));

    while($row = $res->fetch_array()){
        $_SESSION['id'] = $row['id'];
    }

    function fetchUserApiKey(){
        $id = $_SESSION['id'];
        $con = new DBConnect();

        $sql = "SELECT api_key FROM api_keys WHERE user_id = '$id'";
        $res = mysqli_query($con->conn, $sql) or die("Error ".mysqli_error($con->conn));

        if($res->num_rows <= 0){
            return "Please Generate an API key";
        }
        else{
            while($row = $res->fetch_array()){
                $api_key = $row['api_key'];
            }
            return $api_key;
        }
    }
?>
<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>Private Page</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="validate.css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
                
        <script type="text/javascript" src="validate.js"></script>
        <script type="text/javascript" src="apikey.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css.map">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css.map">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css.map">
    </head>
    <body>
    
        <p align="right">
            <a href="Logout.php">Logout</a>
        </p>
        <h1 class="cover-heading">Welcome, <?= $_SESSION['username']?></h1>
        <hr>
        <h3>Here, we will create an API that allow Users/Developers to order items from external systems. <br>
        We now put this feature of allowing users to generate an API key.<br> Click the button to generate the API key.</h3>

        <button class = "btn btn-primary" id ="api-key-btn">Generate the API key</button><br><br>

        <strong>Your API key:</strong>
        (Note that if your API  is already in use by already running applications,
        generating a new key will stop the application from functioning)<br>
        <textarea cols = "100" row="2" id="api_key" name="api_key" readonly><?php echo fetchUserApiKey();?></textarea>

        <h3>Service Description:</h3>
        We have a service/API that allows external 
        applications to order food and also pull all 
        order status by using order id.<br>
        Let's do it.
    </body>
</html>