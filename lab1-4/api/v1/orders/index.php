<?php
    include_once 'apiHandler.php';
    include_once '../../../DBConnector.php';
    $api = new ApiHandler();

    if($_SERVER['REQUEST_METHOD' === 'POST']){

        //check api key from the header
        $api_key_correct = false;
        $headers = apache_request_headers();
        $header_api_key = $headers['Authorization'];
        $api->setUserApiKey($header_api_key);
        $api_key_correct = $api->checkApiKey();

        if($api_key_correct){

            //Creating an order
            $name_of_food = $_POST['name_of_food'];
            $number_of_units = $_POST['number_of_units'];
            $unit_price = $_POST['unit_price'];
            $order_status = $_POST['order_status'];

            //Connect to database
            $con = new DBConnect();

            //Use Getters and Setters to assign values
            $api->setMealName($name_of_food);
            $api->setMealUnits($number_of_units);
            $api->setUnitPrice($unit_price);
            $api->setStatus($order_status);
            $res = $api->createOrder();
            if($res){

                //Create a json and respond
                $response_array = ['success' => 1, 'message' => 'Order has been placed'];
                header('Content-type: application/json');
                echo json_encode($response_array);
            }
        }
        else{
            $response_array = ['success' => 0, 'message' => 'Wrong API Key'];
            header('Content-type: application/json');
            echo json_encode($response_array);
        }
    }else if($_SERVER['REQUEST_METHOD'] === 'GET'){
        //For retrieving order status
    }
    else{
        //Sorry we are not supporting this for now
    }
?>
