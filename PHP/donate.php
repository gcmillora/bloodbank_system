<?php
function send_alert($message){
    echo '<script language="javascript">';
    echo 'alert("',$message,'");';
    echo "window.location.href='../user-dashboard-donate.html';";
    echo '</script>';
}

if(isset($_POST['name-person']) && isset($_POST['contact-input']) && isset($_POST['location']) && isset($_POST['donate-date'])){
    include 'db_conn.php';
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name-person']);
    $number = validate($_POST['contact-input']);
    $location = validate($_POST['location']);
    //$date = date('Y-m-d', strtotime($_POST['donate-date']));
    $date = new DateTime($_POST['donate-date']);
    $date_string = $date->format('Y-m-d H:i:s');
    $now = new DateTime();

    if(empty($name) || empty($number) || empty($location) || empty($date)){
        send_alert("Missing Parameters");
        mysqli_close($conn);
        exit();
    }

    else{
        //Check if date is invalid
        if($date <= $now) {
            send_alert("Invalid Date");
            mysqli_close($conn);
            exit();
        }

        // Check if user is in the database
        $find_user = "SELECT User_ID, User_Blood_Type FROM user WHERE User_Name = '$name' AND User_Contact_Number = '$number'";
        if($sql_user = mysqli_query($conn,$find_user)){
            $User_Info = mysqli_fetch_assoc($sql_user);

            if($User_Info == NULL){
                send_alert("Could not find ".$name);
                mysqli_close($conn);
                exit();
            }

            $UID = $User_Info["User_ID"];
            $Blood_Type = $User_Info["User_Blood_Type"];
        }
        else echo "User Error";
        
        $find_hosp = "SELECT Hospital_ID FROM hospital WHERE Hospital_Name = '$location'";
        if($sql_loc = mysqli_query($conn,$find_hosp)){
            $Hosp_ID = mysqli_fetch_assoc($sql_loc);
            $HID = $Hosp_ID["Hospital_ID"];
        }
        else echo "Hospital Error";

        $set_app = "INSERT INTO donation(User_ID,Hospital_ID,Appointment_Date) VALUES('$UID','$HID','$date_string')";
        if(mysqli_query($conn,$set_app)){
            $get_bid = "SELECT BloodGroups_ID FROM stocks WHERE Hospital_ID = '$HID'";
            if($sql_bid = mysqli_query($conn,$get_bid)){
                $Blood_ID = mysqli_fetch_assoc($sql_bid);
                $BID = $Blood_ID["BloodGroups_ID"];
                $update_stock = "UPDATE blood_groups SET `".$Blood_Type."` = `".$Blood_Type."` + 1 WHERE BloodGroups_ID = '$BID'";
                echo $update_stock;
                if(mysqli_query($conn,$update_stock)){
                    send_alert("Your donation request has been sent!");
                    mysqli_close($conn);
                    exit();
                }
                else {
                    send_alert(mysqli_errno($conn));
                    mysqli_close($conn);
                    exit();
                }
            }
            else echo "BloodGroup Not Found.";
        }
        else echo "Insert Error";
    }
}
else{
    //send_alert("Unable to connect.");
    exit();
}
?>