<!DOCTYPE html>
<?php
  session_start();

  function send_alert_error($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../login.html';";
        echo '</script>';
    }

  if(isset($_SESSION['Hospital_Name']) && isset($_SESSION['Hospital_ID'])){
    include 'php/db_conn.php';

    $Hosp_Name = $_SESSION['Hospital_Name'];
    $HID = $_SESSION['Hospital_ID'];

    $sql_bid = "SELECT BloodGroups_ID FROM stocks WHERE Hospital_ID = '$HID'";
    if($get_bid = mysqli_query($conn,$sql_bid)){
      $arr = mysqli_fetch_assoc($get_bid);
      $BID = $arr["BloodGroups_ID"];
    }
    $sql_type = "SELECT * FROM blood_groups WHERE BloodGroups_ID = '$BID'";
  }
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="hospital-dashboard.css">
  <link rel="stylesheet" href="hospital-dashboard-stock.css">
  <title>Stocks</title>
</head>
<body>
  <!--MENU-->
  <div class="sidenav">
    <div class="float-container">
        <div class="float-child">
           <div class="icon"><img src="icons/Hospital-Dashboard-Menu/rh-.png"></div>
        </div>
        <div class="float-child">
          <div class="prof-text">
            <p><b><?php echo $_SESSION['Hospital_Name']?></b></p>
            <small>Davao City</small>
          </div>
        </div>

    </div>

    <div class="menu">
      <div class="dashboard">
        <a href="hospital-dashboard.php" id="first-sidebar" class="a"><img src="icons/menu/medical-center.png">Dashboard</a>
      </div>
      <div class="request">
        <a href="hospital-dashboard-request.php" class="a"><img src="icons/menu/volunteer.png">Requests</a>
      </div>
      <div class="stock">
        <a href="#" class="a"><img src="icons/Hospital-Dashboard-Menu/blood-bag.png">Stock</a>
      </div>
      <div class="sidebar-bottom">
        <table>
          <th><a href="logout.php" id="log-out">Log-out</a></th>
        </table>
      </div>
    </div>
  </div>

  <div class="outgoing">
    <div class="table-header">
      <table>
        <th><h2>Stocks</h2></th>
      </table>
    </div>
    <table class="table-content" style="width: 90%" id="table-requested">
      <tr class="table-row">
        <th>Blood Type</th>
        <th>Status</th>
        <th>Quantity</th>
      </tr>
      <?php
        include 'php/db_conn.php';
        function get_stat($val){
          if($val < 7) return "Running Low";
          else return "Available";
        }

        function check_val($arr){
          if($arr == NULL) return 0;
          else return $arr;
        }

      if($get_t = mysqli_query($conn,$sql_type)){
        if($get_t->num_rows>0){
          if($type=$get_t->fetch_assoc()){
            echo "<tr><td>A+</td><td>".get_stat(intval($type["A+"]))."</td><td>".check_val($type["A+"])."</td></tr>
            <tr><td>A-</td><td>".get_stat(intval($type["A-"]))."</td><td>".check_val($type["A-"])."</td></tr>
            <tr><td>B+</td><td>".get_stat(intval($type["B+"]))."</td><td>".check_val($type["B+"])."</td></tr>
            <tr><td>B-</td><td>".get_stat(intval($type["B-"]))."</td><td>".check_val($type["B-"])."</td></tr>
            <tr><td>AB+</td><td>".get_stat(intval($type["AB+"]))."</td><td>".check_val($type["AB+"])."</td></tr>
            <tr><td>AB-</td><td>".get_stat(intval($type["AB-"]))."</td><td>".check_val($type["AB-"])."</td></tr>
            <tr><td>O+</td><td>".get_stat(intval($type["O+"]))."</td><td>".check_val($type["O+"])."</td></tr>
            <tr><td>O-</td><td>".get_stat(intval($type["O-"]))."</td><td>".check_val($type["O-"])."</td></tr>";
          }
          echo"</table>";
        }
        else{
          echo "0 result";
        }
      }
        mysqli_close($conn);
        ?>
  </div>
</body>
</html>