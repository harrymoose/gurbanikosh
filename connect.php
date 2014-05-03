<?php	
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        $connect = new mysqli('localhost','root', 'root', 'gurbanidb');

        if($connect->connect_errno){
            echo "connection failed";
            die($mysqli->connect_error);
        }
        $connect->set_charset("utf8");
?>
