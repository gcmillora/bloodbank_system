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
  }
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="hospital-dashboard.css">
  <link rel="stylesheet" href="hospital-dashboard-request.css">
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
        <th id="filter"><button type="button"><img src="icons/hospital-dashboard/filter.png">Filter</button></th>
        <th id="search-box"><input type="text" placeholder="Search..."></th>
      </table>
    </div>
    <table class="table-content" style="width: 90%" id="table-requested">
      <tr class="table-row">
        <th>Name</th>
        <th>Location</th>
        <th>Blood Type</th>
        <th>Sex</th>
      </tr>
      <?php
        include 'php/db_conn.php';
        $sql = "SELECT user.User_Name,
        user.User_Address, user.User_Blood_Type, user.User_Age FROM request
        INNER JOIN user ON request.User_ID=user.User_ID
        WHERE request.Hospital_ID = '$HID'"; 
        $result = mysqli_query($conn,$sql);

        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
            echo "<tr><td>".$row["User_Name"]."</td><td>".$row["User_Address"]."</td><td>".$row["User_Blood_Type"]."</td><td>".$row["User_Age"]."</td></tr>";
          }
          echo"</table>";
        }
        else{
          echo "0 result";
        }
        mysqli_close($conn);
        ?>
  </div>
</body>
</html>