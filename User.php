<?php
include "Crud.php";
include "Authenticator.php";

class User implements Crud,Authenticator{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;
    private $username;
    private $password;

//class constructor initialized our variable so they  can be instanciated from anywhere
    function __construct($first_name, $last_name,$city_name,$username,$password){
        $this->first_name=$first_name;
        $this->last_name=$last_name;
        $this->city_name=$city_name;
        $this->username=$username;
        $this->password =$password;

    }


    //user id setter
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
    //user id getter
    public function getUserId(){
        return $this->$user_id;
    }

    public function save(){
            $connect = new DBConnect();
            $fn = $this->first_name;
            $ln = $this->last_name;
            $city = $this->city_name;
            $uname = $this->username;
            $this->hashPassword();
            $pass=$this->password;

            $result = mysqli_query($con->conn,"INSERT INTO `user`(`first_name`, `last_name`,`user_city`,`username`,`password`)VALUES('$fn','$ln','$city','$uname','$pass')") or die("Error " .mysql_error());    
            return $result;
            $connect->closeDatabase();
        }



    public function readAll(){
        $connect = new DBConnect();
        $array = array();
        $query = 'SELECT * FROM user';
        $result = mysqli_query($connect->conn, $query);
        return $result;
    }
    public static function create(){
        $instance = new self();
        return $instance;
    }
    //usernmame setter
    public function setUsername ($username){
        $this->username = $username;

    }
    //username getter
    public function getUsername(){
        return $this->username;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function getPassword(){
        return $this->password;
    }


    public function readUnique(){
        return null;
    }
    public function search(){
        return null;
    }
    public function removeAll(){
        return null;
    }
    public function update(){
        return null;
    }
    public function removeOne(){
        return null;
    }

    public function validateForm(){
        
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;

        if($fn == "" || $ln == "" || $city==""){
            return false;
        }
        return true;
    }

    public function createFormErrorSession(){
        session_start();
        $_SESSION['form_errors'] = "All fields are required";
    }

        public function hashPassword(){
            $this->password = password_hash($this->password,PASSWORD_DEFAULT);
            
        }

        public function isPasswordCorrect($username,$password){
            $connect = new DBConnect();
            $found = false;
            $result = mysqli_query($connect->conn,'SELECT * FROM user') or die("Error" .mysql_error());
       
       while($row = $result->fetch_assoc()){
           if(password_verify($password,$row['password'] && $username == $row['username'])){
               $found=true;
           }
       }

       $connect ->closeDB();
       return found;
        }

        public function login(){
            if($this->isPasswordCorrect()){
                header("Location:PrivatePage.php");
            }
        }

        public  function createUserSession($username){
            session_start();
            $_SESSION['username'] = $username;

        }
        public function logout(){
            session_start();
            unset($_SESSION['username']);
            session_destroy();
            header("Location:Form.php");
        }
}
?>