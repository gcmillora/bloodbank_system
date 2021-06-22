<?php
function send_alert($message){
    echo '<script language="javascript">';
    echo 'alert("',$message,'");';
    echo "window.location.href='../user-dashboard-request.html';";
    echo '</script>';
}

if(isset($_POST['full-name']) && isset($_POST['number']) && isset($_POST['location'])){
    include 'db_conn.php';
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['full-name']);
    $number = validate($_POST['number']);
    $location = validate($_POST['location']);

    if(empty($name) || empty($number) || empty($location)){
        send_alert("Missing Parameters");
        mysqli_close($conn);
        exit();
    }
    else{
        // Get user Blood Type
        
        $find_user = "SELECT User_Blood_Type, User_ID FROM user WHERE User_Name = '$name' AND User_Contact_Number = '$number'";
        if($bltype = mysqli_query($conn,$find_user)){
            $blood = mysqli_fetch_assoc($bltype);

            if($blood == NULL){
                send_alert("Could not find ".$name);
                mysqli_close($conn);
                exit();
            }
            $blood_type = $blood["User_Blood_Type"];
            $uid = $blood["User_ID"];
        }

        // Get hospital ID

        $find_hospital = "SELECT Hospital_ID FROM hospital WHERE Hospital_Name = '$location'";
        if($hospital = mysqli_query($conn,$find_hospital)){
            $hid = mysqli_fetch_assoc($hospital);

            $hosp_ID = $hid["Hospital_ID"];
        }

        // Get Blood Group ID from the Hospital ID

        $find_blid = "SELECT BloodGroups_ID FROM stocks WHERE Hospital_ID = '$hosp_ID'";
        if($blid_check = mysqli_query($conn,$find_blid)){
            $blid = mysqli_fetch_assoc($blid_check);

            $blood_ID =$blid["BloodGroups_ID"];
        }
        
        // Check if the blood is in stock for that Hospital
        $checkavlbl = "SELECT `".$blood_type."` FROM blood_groups WHERE BloodGroups_ID = '$blood_ID'";
        if($check = mysqli_query($conn,$checkavlbl)){
            $count = mysqli_fetch_assoc($check);

            // If the blood is greater than 0 then it is available
            if(intval($count["$blood_type"]) > 0){
                $sql_req = "INSERT INTO request(User_ID, Hospital_ID) VALUES ('$uid','$hosp_ID')";
                if(mysqli_query($conn,$sql_req)){
                    send_alert("Request Successful!");
                    mysqli_close($conn);
                    exit();
                }
                else{
                    send_alert(mysqli_errno($conn));
                    mysqli_close($conn);
                    exit();
                }
            }
            // The blood is not available
            else{
                send_alert("Blood type not available in ".$location);
                mysqli_close($conn);
                exit();
            }
        }
    }
    mysqli_close($conn);
}
else {
    send_alert("Unable to connect.");
    exit();
}
?>