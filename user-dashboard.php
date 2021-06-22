<?php
  session_start();

  function send_alert_error($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../login.html';";
        echo '</script>';
    }

  if(isset($_SESSION['User_Name']) && isset($_SESSION['User_ID'])){

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="user-dashboard.css">
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
            <p><b><?php echo $_SESSION['Hospital_Name']?></b></p>
            <small>Davao City</small>
          </div>
        </div>

    </div>

    <div class="menu">
      <div class="donate">
        <a href="user-dashboard-donate.html" id="first-sidebar" class="a"><img src="icons/menu/medical-center.png">Donate</a>
      </div>
      <div class="request">
        <a href="user-dashboard-request.html" class="a"><img src="icons/menu/volunteer.png">Request</a>
      </div>
      <div class="search">
        <a href="#" id="third-sidebar" class="a"><img src="icons/menu/blood-transfusion.png">Search</a>
      </div>
      <div class="sidebar-bottom">
        <table>
          <th><a href="login.html" id="log-out">Log-out</a></th>
        </table>
      </div>
    </div>
  </div>s

  <!--Red banner-->
  <div class="header">
  </div>

  <!--Title of table w/ Search-->
  <div class="table-header">
    <table>
      <th><h2> Hospitals</h2></th>
      <th id="search-box"><input type="text" placeholder="Search..."></th>
    </table>
  </div>

  <!--Table-->
  <div class="content">
    <table class="table-content" style="width: 90%">
      <tr>
        <th>Hospital</th>
        <th>Location</th>
        <th>Total Blood Bags</th>
        <th>Status</th>
      </tr>
      <tr>
        <td>Lorem Ipsum Hospital</td>
        <td>Westminster, United States</td>
        <td>9</td>
        <td>Available</td>
      </tr>
      <tr>
        <td>Lorem Ipsum Hospital</td>
        <td>Westminster, United States</td>
        <td>9</td>
        <td>Available</td>
      </tr>
      <tr>
        <td>Lorem Ipsum Hospital</td>
        <td>Westminster, United States</td>
        <td>9</td>
        <td>Available</td>
      </tr>
      <tr>
        <td>Lorem Ipsum Hospital</td>
        <td>Westminster, United States</td>
        <td>9</td>
        <td>Available</td>
      </tr>
      <tr>
        <td>Lorem Ipsum Hospital</td>
        <td>Westminster, United States</td>
        <td>9</td>
        <td>Available</td>
      </tr>
    </table>
  </div>
</body>
</html>

<?php
}else{
  send_alert_error("Session Invalid");
}

?>