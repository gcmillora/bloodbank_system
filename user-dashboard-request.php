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
    include 'php/db_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request</title>
  <!-- CSS -->
  <style>
    /*General*/

    *{padding: 0; margin: 0;}

    body{
      font-family: sans-serif;
      font-size: 16px;
    }

    /* Menu */
    .request{
      box-sizing: border-box;
      background-color: #D9595C;
      border-style: none;
      border-color: #D9595C;
      border-width: 0.0125em;
      border-radius: 0.9375em;
    }

    .request a{
      color:white;
    }

    .sidenav{
      height: 100%;
      width: 15.625em;
      position: fixed;
      background-color: #F2F2F2;
      left: 0;
      top: 0;
      overflow-x: hidden;
      padding-top: 1.25em;
      font-family: sans-serif;
    }

    .menu{
      padding-top: 2em;
    }

    .menu img{
      width: 15%;
      padding-right: 1.25em;
      vertical-align: middle;
    }

    .profile img{
      width: 30%;
    }

    .profile{
      padding-top: 3em;
    }

    .profile table{
      border-style: solid;
      border-collapse: collapse;
      padding-right: 100px;
    }

    .profile tr, td{
      padding-right: 100px; 
    }

    .a{
      padding: 1.0625em 0.5em 0.75em 3.125em;
      text-decoration: none;
      font-size: 1.125em;
      color: #4D4D4D;
      display: block;
    }

    .sidebar-bottom{
      position: absolute;
      top: 5em;
    }

    .sidebar-bottom a{
      text-decoration: none;
      color: black;
    }

    #log-out{
      padding-left: 5.3125em;
      color: #D9595C;
    }

    .float-container {
      padding-top: 20px;
      padding-left: 30px;
      padding-bottom: 50px;
    }

    .icon {
        width: 25%;
        float: left;
        padding: 10px ;
    }  

    .icon img{
      width: 90%;
    }

    .prof-text{
      padding-top: 17px;
      padding-left: 0px;
    }

    .prof-text b{
      color: #D9595C;
    }

    .prof-text small{
      color: #8D8D8D;
    }

    /*Content*/
    .content{
      padding-left: 350px;
      padding-top: 5em; 
    }

    .location{
      padding-top: 10px;
    }

    #dropdown{
      border-radius: 5px;
      width: 30%;
      border-color: #E0E0E0;
      padding: 6px 6px 6px 6px;
    }
    .first-question{
      padding-top: 20px;
    }
    .second-question{
      padding-top: 20px;
    }
    .third-question{
      padding-top: 20px;
    }
    .fourth-question{
      padding-top: 20px;
    }

    .date{
      padding-top: 10px;
    }

    #donate-date{    
      padding: 6px 6px 6px 6px;
      width: 30%;
      font-family: sans-serif;
    }
    .first-question input{
      border: 1px solid #E0E0E0;
      border-radius: 5px;
      padding: 6px 6px 6px 6px
    }
    .second-question input{
      border: 1px solid #E0E0E0;
      border-radius: 5px;
      padding: 6px 6px 6px 6px
    }

    .info{
      width: 50%;
      padding-top: 30px;
    }

    .info h2{
      padding-top: 15px;
      color: #D9595C;
    }

    .info p{
      padding-top: 10px;
    }

    .appointment{
      padding-top: 20px;
    }

    .content button{
      width: 18%;
      padding: 10px 10px 10px 10px;
      border: 1px solid #D9595C;
      background-color: #D9595C;
      border-radius: 5px;
      color: white;
    }

    .content button:hover {
      background-color: white;
      color: black;
    }

  </style>
  <link rel="stylesheet" href="user-dashboard-request.css">
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
        <div>
          <a href="user-dashboard-donate.php" id="first-sidebar" class="a"><img src="icons/menu/medical-center.png">Donate</a>
        </div>
        <div class="request">
          <a href="user-dashboard-request.php" id="second-sidebar" class="a"><img src="icons/menu/volunteer.png">Request</a>
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

  <div class="content">
    <form method ="post" action="php/request.php">
    <div class="first-question">
      <div class="fullname">
        <h3>Full Name</p>
        <input type="text" id="full-name" name="full-name">
      </div>
    </div>
    <div class="second-question">
      <div class="fullname">
        <h3>Contact Number</p>
        <input type="tel" id="contactnumber" name="number">
      </div>
    </div>
    <div class="fourth-question">
      <div class="hospital">
        <h3>Hospital</p>
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
    <div class="appointment">
      <button type="submit">Request</button>
    </div>
    </form>
    <div class="info">
      <h2>Things to Remember</h2>
      <p>Hydrate and eat a healthy meal before your donation. It is important that before giving blood donors drink plenty of fluids (an extra four 8-ounce glasses of fluids) and eat nutritious foods, rich in iron and vitamin C such as red meat, fish, poultry, beans spinach, iron-fortified cereals or raisins.</p>
      <br>
      <p>You’re never too old to donate blood. While in most states, you must be at least 17 years old to donate blood, there is no upper age limit. In fact, many elderly individuals are some of our most dedicated blood donors, and we encourage others to join them in helping ensure blood products are available for people in need.</p>
      <br>
      <p> Seasonal illnesses like the flu can affect a blood donor’s ability to give. Most medication will not disqualify you from being able to donate, but if you have questions please visit RedCrossBlood.org.</p>
    </div>
  </div>
</body>
</html>


<?php
}else{
  send_alert_error("Session Invalid");

}

?>