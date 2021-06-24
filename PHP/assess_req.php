<?php
    include 'db_conn.php';

    $bid = $_POST['bid'];   // Blood Groups ID
    $uid = $_POST['uid'];
    $res = $_POST['res'];   // Result
    $btype = $_POST['btype'];// Blood Type
    $html = "";

    session_start();

    function send_alert_error($message){
          echo '<script language="javascript">';
          echo 'alert("',$message,'");';
          echo "window.location.href='../login.html';";
          echo '</script>';
      }

    if(isset($_SESSION['Hospital_Name']) && isset($_SESSION['Hospital_ID'])){
      
        $HID = $_SESSION['Hospital_ID'];
    
        if($res == "approved"){
            $update = "UPDATE blood_groups SET `".$btype."` = `".$btype."` - 1 WHERE BloodGroups_ID = '$bid' ";
            if(!mysqli_query($conn,$update)){
                echo "failed";
                exit();
            }
        }
        $remove = "DELETE FROM request WHERE User_ID = '$uid' AND Hospital_ID = '$HID'";
        if(!mysqli_query($conn,$remove)){
            echo "failed";
            exit();
        }

        $sql = "SELECT user.User_ID,user.User_Name,
        user.User_Address, user.User_Blood_Type, user.User_Sex FROM request
        INNER JOIN user ON request.User_ID=user.User_ID
        WHERE request.Hospital_ID = '$HID'
        ORDER BY user.User_Name ASC"; 
        $result = mysqli_query($conn,$sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $html.= "<tr>
                            <td>".$row["User_Name"]."</td>
                            <td>".$row["User_Address"]."</td>
                            <td>".$row["User_Blood_Type"]."</td>
                            <td>".$row["User_Sex"]."</td>
                            <td><button onclick='approve(".$bid.",".$row["User_ID"].",`".$row["User_Blood_Type"]."`);'>Approve</button>
                                            <button onclick='reject(".$bid.",".$row["User_ID"].",`".$row["User_Blood_Type"]."`);'>Reject</button>
                            </td>
                        </tr>";
            }
            echo $html;
        }else echo "not enough";
    }
    mysqli_close($conn);
?>