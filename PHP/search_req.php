<?php
    include 'db_conn.php';

    session_start();

    function send_alert_error($message){
          echo '<script language="javascript">';
          echo 'alert("',$message,'");';
          echo "window.location.href='../login.html';";
          echo '</script>';
      }
  
    if(isset($_SESSION['Hospital_Name']) && isset($_SESSION['Hospital_ID'])){
      
        $HID = $_SESSION['Hospital_ID'];

        $sql_bid = "SELECT BloodGroups_ID FROM stocks WHERE Hospital_ID = '$HID'";
        if($get_bid = mysqli_query($conn,$sql_bid)){
            $arr = mysqli_fetch_assoc($get_bid);
            $BID = $arr["BloodGroups_ID"];
        }

        $columnName = $_POST['filter'];
        $key = $_POST['value'];
        $req = $_POST['req'];
        $html = "";
        
        $sql = "SELECT user.User_ID,user.User_Name,
            user.User_Address, user.User_Blood_Type, user.User_Sex FROM request
            INNER JOIN user ON request.User_ID = user.User_ID
            WHERE request.Hospital_ID = '$HID' AND ".$columnName." LIKE '%".$key."%' 
            ORDER BY ".$columnName." ASC";
        $result = mysqli_query($conn,$sql);
        if($result !== false && $result->num_rows>0){
            while($row=$result->fetch_assoc()){
            $html .= "<tr>
            <td>".$row["User_Name"]."</td>
            <td>".$row["User_Address"]."</td>
            <td>".$row["User_Blood_Type"]."</td>
            <td>".$row["User_Sex"]."</td>";
                if($req == "Y"){
                    $html .=  "<td><button onclick='approve(".$BID.",".$row["User_ID"].",`".$row["User_Blood_Type"]."`);'>Approve</button>
                    <button onclick='reject(".$BID.",".$row["User_ID"].",`".$row["User_Blood_Type"]."`);'>Reject</button></td>
                </tr>";
                }
            }
            echo $html;
        }
        else{
            echo "";
        }
        mysqli_close($conn);
    }
?>