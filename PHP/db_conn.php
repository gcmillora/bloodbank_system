<?php
    $sname = "localhost";
    $uname = "root";
    $password= "";

    $db_name = "blood_donation_sys";
    
    $conn = mysqli_connect($sname,$uname,$password,$db_name) or die("Connection to database failed");

    if(!$conn){
        die("Connection failure!");
    }
?>