<?php
  session_start();
  include 'php/send_alert_error.php';
  // function send_alert_error($message){
  //       echo '<script language="javascript">';
  //       echo 'alert("',$message,'");';
  //       echo "window.location.href='../login.html';";
  //       echo '</script>';
  //   }

  if(isset($_SESSION['User_Name']) && isset($_SESSION['User_ID'])){

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="user-dashboard.css">
  <link rel="stylesheet" href="filter-search.css">
  <script src='js/jquery-3.6.0.min.js' type='text/javascript'></script>
  <script src='js/order.js' type='text/javascript'></script>
  <title>User Dashboard</title>
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
            <p><b><?php echo $_SESSION['User_Name']?></b></p>
            <small><?php echo $_SESSION['User_Contact_Number']?></small>
          </div>
        </div>

    </div>

    <div class="menu">
      <div class="donate">
        <a href="user-dashboard-donate.php" id="first-sidebar" class="a"><img src="icons/menu/medical-center.png">Donate</a>
      </div>
      <div class="request">
        <a href="user-dashboard-request.php" class="a"><img src="icons/menu/volunteer.png">Request</a>
      </div>
      <div class="search">
        <a href="user-dashboard.php" id="third-sidebar" class="a"><img src="icons/menu/blood-transfusion.png">Search</a>
      </div>
      <div class="sidebar-bottom">
        <table>
          <th><a href="logout.php" id="log-out">Log-out</a></th>
        </table>
      </div>
    </div>
  </div>s

  <!--Red banner-->
  <div class="header">
  </div>

  <!--Title of table-->
  <div class="table-header">
    <table>
      <th><h2> Hospitals</h2></th>
    </table>
  </div>

  <!--Table-->
  <div class="content">
    <div class="util-bar">
      Search by <span class="put-margins"> <select name="filter"> </span>
              <option value="Hospital_Name">Hospital</option>
              <option value="Hospital_Address">Location</option>
              <option value="Hospital_Contact_Number">Contact Number</option>
            </select>
      <span class="put-margins"> <input type ="text" size = "30" id="tfield" onkeyup="showSuggestion(this.value)"></span>
      <span class="put-margins"> <button onclick="showResult_hosp(document.getElementById('tfield').value)">Search</button></span>
      <span class="put-margins"> <button onclick='sortHosp("Hospital_Name");'>Reset</button></span>
      <input type='hidden' id='sort_hosp' value='DESC'>
      <input type='hidden' id='sort_loc' value='DESC'>
      <input type='hidden' id='sort_num' value='DESC'>
    </div>
    <table class="table-content" style="width: 90%" id="table-hosp">
      <tr>
        <th><span onclick='sortHosp("Hospital_Name");'>Hospital</span></th>
        <th><span onclick='sortHosp("Hospital_Address");'>Location</span></th>
        <th><span onclick='sortHosp("Hospital_Contact_Number");'>Contact Number</span></th>
      </tr>
      <?php
        include 'php/db_conn.php';
        $sql = "SELECT Hospital_Name,
        Hospital_Address, Hospital_Contact_Number FROM hospital
        ORDER BY Hospital_Name ASC"; 
        $result = $conn->query($sql);

        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
      ?>
        <tr><td><?php echo $row["Hospital_Name"]; ?></td>
        <td><?php echo $row["Hospital_Address"]; ?></td>
        <td><?php echo $row["Hospital_Contact_Number"]; ?></td></tr>
      <?php
          }
        }
        else{
          echo "0 result";
        }
        $conn->close();
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