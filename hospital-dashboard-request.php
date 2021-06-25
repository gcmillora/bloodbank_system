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
  }
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="hospital-dashboard.css">
  <link rel="stylesheet" href="hospital-dashboard-request.css">
  <script src='js/jquery-3.6.0.min.js' type='text/javascript'></script>
  <script src='js/order.js' type='text/javascript'></script>
  <title>Requested</title>
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
        <a href="#" class="a"><img src="icons/menu/volunteer.png">Requests</a>
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

  <div class="overview">
    <div class="table-header">
      <table>
        <th><h2> Requested</h2></th>
      </table>
    </div>
    Search by <select name="filter"> 
            <option value="user.User_Name">Name</option>
            <option value="user.User_Address">Location</option>
            <option value="user.User_Blood_Type">Blood Type</option>
            <option value="user.User_Sex">Sex</option>
          </select>
    <input type ="text" size = "30" id="tfield" onkeyup="showSuggestion(this.value)">
    <button onclick="showResult(document.getElementById('tfield').value,'Y')">Search</button>
    <button onclick='sortReq("user.User_Name","yes");'>Reset</button>
    <input type='hidden' id='sort_name' value='DESC'>
    <input type='hidden' id='sort_address' value='DESC'>
    <input type='hidden' id='sort_blood_type' value='DESC'>
    <input type='hidden' id='sort_sex' value='DESC'>
    <table class="table-content" style="width: 90%" id="table-requested">
      <tr class="table-row">
        <th><span onclick='sortReq("user.User_Name","yes");'>Name</span></th>
        <th><span onclick='sortReq("user.User_Address","yes");'>Location</span></th>
        <th><span onclick='sortReq("user.User_Blood_Type","yes");'>Blood Type</span></th>
        <th><span onclick='sortReq("user.User_Sex","yes");'>Sex</span></th>
        <th>Status</th>
      </tr>
      <?php
        include 'php/db_conn.php';
        $sql = "SELECT user.User_ID,user.User_Name,
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
          <td><?php echo "<button onclick='approve(",$BID,",",$row["User_ID"],",`",$row["User_Blood_Type"],"`);'>Approve</button>
                          <button onclick='reject(",$BID,",",$row["User_ID"],",`",$row["User_Blood_Type"],"`);'>Reject</button>"; ?>
          </td>
        </tr>
      <?php
          }
        }
        else{
          echo "<tr><td></td><td>0 results</td></tr>";
        }
        mysqli_close($conn);
      ?>
    </table>
  </div>
</body>
</html>