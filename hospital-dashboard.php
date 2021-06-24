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
    if($get_t = mysqli_query($conn,$sql_type)) 
      $type = mysqli_fetch_assoc($get_t);
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="hospital-dashboard.css">
  <link rel="stylesheet" href="hospital-dashboard-home.css">
  <script src='js/jquery-3.6.0.min.js' type='text/javascript'></script>
  <script src='js/order.js' type='text/javascript'></script>
  <title>Hospital Dashboard</title>
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
        <a href="#" id="first-sidebar" class="a"><img src="icons/menu/medical-center.png">Dashboard</a>
      </div>
      <div class="request">
        <a href="hospital-dashboard-request.php" class="a"><img src="icons/menu/volunteer.png">Requests</a>
      </div>
      <div class="stock">
        <a href="hospital-dashboard-stock.php" class="a"><img src="icons/Hospital-Dashboard-Menu/blood-bag.png">Stock</a>
      </div>
      <div class="sidebar-bottom">
        <table>
          <th><a href="logout.php" id="log-out">Log-out</a></th>
        </table>
      </div>
    </div>
  </div>

  <!-- HEADER -->
  <div class="header">
    <table>
      <tr>
        <td>
          <div class="total-requested">
            <h3 class="total-text">Requested</h3>
            <p class="total">Total</p>
            <b><p id="total-requested-number">
            <?php
              include 'php/db_conn.php';
              $sql = "SELECT COUNT(Request_ID) FROM request";
              $get_data = mysqli_query($conn,$sql);
              $arr = mysqli_fetch_array($get_data);
              echo $arr[0];
            ?></p></b>
          </div>
        </td>
        <td>
          <div class="in-stock">
            <h3 class="total-text">In Stock</h3>
             <p class="total">Blood Types</p>
            <div class="in-stock-table">
              <table class="in-stock-tab">
                <tr>
                  <td class="blood-type">O+</td>
                  <td><?php echo $type["O+"]; ?></td>
                  <td class="blood-type">AB+</td>
                  <td><?php echo $type["AB+"]; ?></td>
                </tr>
                <tr>
                  <td class="blood-type">O-</td>
                  <td><?php echo $type["O-"]; ?></td>
                  <td class="blood-type">AB-</td>
                  <td><?php echo $type["AB-"]; ?></td>
                </tr>
                <tr>
                  <td class="blood-type">A+</td>
                  <td><?php echo $type["A+"]; ?></td>
                  <td class="blood-type">B+</td>
                  <td><?php echo $type["B+"]; ?></td>
                </tr>
                <tr>
                  <td class="blood-type">A-</td>
                  <td><?php echo $type["A-"]; ?></td>
                  <td class="blood-type">B-</td>
                  <td><?php echo $type["B-"]; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>

  <div class="overview">
    <h1>Overview</h1>
    <div class="table-header">
      <table>
        <th><h2> Requested</h2></th>
      </table>
    </div>
    <input type='hidden' id='sort_name' value='DESC'>
    <input type='hidden' id='sort_address' value='DESC'>
    <input type='hidden' id='sort_blood_type' value='DESC'>
    <input type='hidden' id='sort_sex' value='DESC'>
    <table class="table-content" style="width: 90%" id="table-requested">
      <tr class="table-row">
        <th><span onclick='sortReq("user.User_Name");'>Name</span></th>
        <th><span onclick='sortReq("user.User_Address");'>Location</span></th>
        <th><span onclick='sortReq("user.User_Blood_Type");'>Blood Type</span></th>
        <th><span onclick='sortReq("user.User_Sex");'>Sex</span></th>
        <th>Status</th>
      </tr>
      <?php
        include 'php/db_conn.php';
        $sql = "SELECT user.User_Name,
        user.User_Address, user.User_Blood_Type, user.User_Sex FROM request
        INNER JOIN user ON request.User_ID=user.User_ID
        WHERE request.Hospital_ID = '$HID'
        ORDER BY user.User_Name ASC"; 
        $result = mysqli_query($conn,$sql);

        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
      ?>
            <tr>
              <td><?php echo $row["User_Name"]; ?></td>
              <td><?php echo $row["User_Address"]; ?></td>
              <td><?php echo $row["User_Blood_Type"]; ?></td>
              <td><?php echo $row["User_Sex"]; ?></td>
            </tr>
      <?php
          }
        }
        else{
          echo "0 result";
        }
        mysqli_close($conn);
      ?>
    </table>
  </div>
</body>
</html>

<?php
}else{
   send_alert_error("Session Invalid");
}

?>
