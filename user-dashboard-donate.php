<?php
  session_start();

  function send_alert_error($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../login.html';";
        echo '</script>';
    }

  if(isset($_SESSION['User_Name']) && isset($_SESSION['User_ID'])){
    include 'php/db_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="user-dashboard-donate.css">
  <title>Donate</title>
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
    </div>

  <!--CONTENT-->
  <div class="content">
    <form method="post" action="php/donate.php">
      <div class="name-of-person">
        <h2>Name</h2>
        <div class="name">
          <input type="text" name="name-person">
        </div>
      </div>
      <div class="contact-num">
        <h2>Contact Number</h2>
        <div class="contact">
          <input type="tel" name="contact-input">
        </div>
      </div>
      <div class="first-question">
        <h2>Where to donate?</h2>
        <div class="location">
          <select name="location" id="dropdown">
          <?php
              $result = $conn->query("SELECT Hospital_ID, Hospital_Name from hospital");
              while ($row = $result->fetch_assoc()) {
                  unset($id, $name);
                  $name = $row['Hospital_Name']; 
                  echo '<option value="'.$name.'">'.$name.'</option>';
              }
    echo "</select>";
          ?>
        </div>
      </div>
      <div class="second-question">
        <h2>When will you donate?</h2>
        <div class="date">
          <input type="date" id="donate-date" name="donate-date">
        </div>
      </div>
      <div class="info">
        <h2>How to donate?</h2>
        <h4>How often can a person donate?</h4>
        <p>A healthy individual may donate every three months.</p>
        <h4>Can a person who has tattoo or body piercing still donate blood?</h4>
        <p>If the tattooing procedure or the piercing was done a year ago, he/she may donate. This is also applicable to acupuncture, and other procedures involving needles.</p>
        <h4>How long will it take to donate blood?</h4>
        <p>The whole process of blood donation, from the registration up to the recovery, will only take an average of 30 minutes.</p>
      </div>
      <div class="appointment">
        <button type="submit">Set an appointment</button>
      </div>
    </form>
  </div>
</body>
</html>

<?php
}else{

  send_alert_error("Session Invalid");
}

?>