<?php
    session_start();

    function send_alert_error($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../login.html';";
        echo '</script>';
    }

    function get_stat($val){
        if($val < 7) return "Running Low";
        else return "Available";
    }

    function check_val($arr){
        if($arr == NULL) return 0;
        else return $arr;
    }

    if(isset($_SESSION['Hospital_Name']) && isset($_SESSION['Hospital_ID'])){
        include 'db_conn.php';

        $HID = $_SESSION['Hospital_ID'];
        $columnName = $_POST['columnName'];
        $sort = $_POST['sort'];
        $html = "";

        $sql_bid = "SELECT BloodGroups_ID FROM stocks WHERE Hospital_ID = '$HID'";
        if($get_bid = mysqli_query($conn,$sql_bid)){
            $arr = mysqli_fetch_assoc($get_bid);
            $BID = $arr["BloodGroups_ID"];
        }

        $blood_groups = array(0=>"A+",1=>"A-",2=>"B+",3=>"B-",4=>"AB+",5=>"AB-",6=>"O+",7=>"O-");
        $sql_type = "SELECT * FROM blood_groups WHERE BloodGroups_ID = '$BID'";

        if($columnName == "btype"){
            if($sort == "DESC") krsort($blood_groups);
            if($get_t = mysqli_query($conn,$sql_type)){
                if($get_t->num_rows>0){
                if($type=$get_t->fetch_assoc()){
                    foreach($blood_groups as $blood => $val){
                        $html .= "<tr><td>".$val."</td><td>". get_stat(intval($type[$val])) ."</td><td>". check_val($type[$val])."</td></tr>";
                        }
                    }
                    else echo "";
                }
                else echo "";
            }
            else echo "";
        }
        else{
            if($get_t = mysqli_query($conn,$sql_type)){
                if($get_t->num_rows>0){
                if($type=$get_t->fetch_assoc()){
                    if($sort == "ASC") asort($type);
                    else arsort($type);
                    foreach($type as $blood => $val){
                        if($blood == "BloodGroups_ID") continue;
                        $html .= "<tr><td>".$blood."</td><td>". get_stat($val) ."</td><td>". check_val($val) ."</td></tr>";
                        }
                    }
                    else echo "";
                }
                else echo "";
            }
            else echo "";
        }
    }
    echo $html;
?>
