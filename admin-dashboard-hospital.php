<?php
  session_start();

  function send_alert_error($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../login.html';";
        echo '</script>';
    }

  if(isset($_SESSION['Admin_Name']) && isset($_SESSION['Admin_ID'])){
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Dashboard</title>
  <!-- CSS -->
  <style>
    /*General*/

    *{padding: 0; margin: 0;}

    body{
      font-family: sans-serif;
      font-size: 16px;
    }

    /* Menu */
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

    .content{
      padding-top: 1.25em;
      padding-left: 20em;
    }
    .dashboard{
      box-sizing: border-box;
      background-color: #D9595C;
      border-style: none;
      border-color: #D9595C;
      border-width: 0.0125em;
      border-radius: 0.9375em;
    }

    .dashboard a{
      color:white;
    }

    .sidebar-bottom{
      position: absolute;
      top: 40em;
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
      /*border: 3px solid #fff;*/
      padding-top: 20px;
      padding-left: 30px;
      padding-bottom: 50px;
    }

    .icon {
        width: 25%;
        float: left;
        padding: 10px ;
        /*border: 2px solid red;*/
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

    /*Header*/
    .header{
      padding-top: 40px;
      padding-left: 330px;
    }

    .header table{
      border-collapse: collapse;
    }

    .totalhospitals{
      height: 168px;
      width: 504px;
      background-color: #EBEBEB;
      border-style: none;
      border-radius: 21px;
      color: black;
      content: "";
        display: table;
        clear: both;
    }

    .total-text{
      display: block; 
      float: left; 
      position: relative; 
      right: 50%;
      bottom: 200%
    }

    .total-outgoing{
      text-align: center;
      margin-left: 20%;
      height: 168px;
      color: #921115;
      width: 260px;
      background-color: #D9595C;
      border-style: none;
      border-radius: 21px;
    }


    #total-hospital-number{
      display: block;  
      position: relative;
      font-size: 130px;
      bottom: 260%;
      left: 20%;
    }

    #total-complaints-number{
      color:white; 
      font-size: 80px;
      

    }

    #table-hosp th span:hover{
      cursor:pointer;
    }


    /*Overview*/
    .overview{
      color: #525252;
      padding-left: 330px;
      padding-top: 30px; 
    }

    /*Padding for title of table and Search*/
    .table-header{
      padding-top: 1.5em;
      padding-bottom: 10px;
      padding-left: 20em;
    }

     /* Search box padding*/
    #search-box{
      position: absolute;
      right: 10em;
    }

    /* Search box design*/
    .table-header input[type=text]{
      font-size: 1.0625em;
      color: #2C2C2C;
      padding: 0.375em 0.375em 0.375em 0.375em;
      border-width: 2px;
      border-style: solid;
      border-radius: 0.3125em;
      border-color: #E0E0E0;
      width: 125%;
    }

    /*Table CSS*/
    table.table-content{
      border: 0.0625em solid #E0E0E0;
      border-radius: 0.25em;
      border-collapse: separate;
      border-spacing: 0;
      text-align: center;
      
    }

    table.table-content th{
       background-color: #F1F1F1;
    }

    table.table-content th:first-child {
      border-radius: 0.1875em 0 0 0;
    }

    table.table-content th:last-child {
      border-radius: 0 0.1875em 0 0;
    }

    table.table-content th:only-child{
      border-radius: 0.25em 0.25em 0 0;
    }

    table.table-content th, td {
      border-bottom: 0.0625em solid #E0E0E0;
      padding: 0.9375em;
    }

    td:not(.table-content){
      border-bottom: none;
    }

    #table-requested{
      border-bottom: 0.0625em solid #E0E0E0;
    }


    #filter{
      padding-left: 130px;
    }

    #filter button{
      width: 15%;
      height: 38px;
      padding: 5px 3px 5px 3px;
      border: 1px solid #E6ECF0;
      background-color: #E6ECF0;
      border-radius: 6px;
      color: black;
      text-align: center;
    }

    #filter button:hover {
      background-color: white;
      color: black;
    }

    #filter img{
      padding-top: 2px;
      padding-right: 10px;
      width: 15%;
    }

    .outgoing{
      color: #525252;
      padding-left: 330px;
      padding-top: 30px; 
      padding-bottom: 40px;
    }
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
      .column {
        float: left;
        width: 50%;
      }

  </style>
  <script src='js/jquery-3.6.0.min.js' type='text/javascript'></script>
  <script src='js/order.js' type='text/javascript'></script>
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
            <p><b><?php echo $_SESSION['Admin_Name']?></b></p>
            <small>Admin</small>
          </div>
        </div>

    </div>

    <div class="menu">
      <div class="dashboard">
        <a href="#" id="first-sidebar" class="a"><img src="icons/menu/medical-center.png">Hospitals</a>
      </div>
      <div class="request">
        <a href="admin-dashboard-users.php" class="a"><img src="icons/menu/volunteer.png">Users</a>
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
          <div class="totalhospitals row">
            <div class="column">
               <?php
                $conn = mysqli_connect("localhost","root","","blood_donation_sys");
                if($conn->connect_error){ 
                  die("Connection failed:".$conn->connect_error); 
                } 
                $sql = "SELECT * FROM hospital"; 
                $result = $conn->query($sql);
                if ($result=mysqli_query($conn,$sql)) {
                     $rowcount=mysqli_num_rows($result);
                    echo "<b><h2 id='total-hospital-number'>".$rowcount."</h2></b>";
                }
            ?>
            </div>
            <div class="column" style="margin-top: 35px"> 
              <b><p id="text-right" style ="font-size: 30px">Hospitals are in the database</p></b>
            </div>
          </div>
        </td>
        <td>
          <div class="total-outgoing">
            <br>
            <p id="total-complaints-number">4</p>
            <p style="color: white">Complaints</p>
          </div>
        </td>
      
      </tr>
    </table>
  </div>
  <div class="table-header">
    <table>
      <th><h2> Hospitals</h2></th>
    </table>
  </div>
  <div class="content">
  Search by <select name="filter"> 
            <option value="Hospital_Name">Hospital</option>
            <option value="Hospital_Address">Location</option>
            <option value="Hospital_Contact_Number">Contact Number</option>
          </select>
    <input type ="text" size = "30" id="tfield" onkeyup="showSuggestion(this.value)">
    <button onclick="showResult_hosp(document.getElementById('tfield').value)">Search</button>
    <button onclick='sortHosp("Hospital_Name");'>Reset</button>
    <input type='hidden' id='sort_hosp' value='DESC'>
    <input type='hidden' id='sort_loc' value='DESC'>
    <input type='hidden' id='sort_num' value='DESC'>
    <table class="table-content" style="width: 90%" id="table-hosp">
      <tr>
        <th><span onclick='sortHosp("Hospital_Name");'>Hospital Name</span></th>
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
          echo "<tr><td></td><td>0 results</td></tr>";
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

