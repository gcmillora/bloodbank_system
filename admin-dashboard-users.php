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
    .request{
      box-sizing: border-box;
      background-color: #D9595C;
      border-style: none;
      border-color: #D9595C;
      border-width: 0.0125em;
      border-radius: 0.9375em;
    }

    .request a{
      color: white;
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

    .totalusers{
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



    #total-user-number{
      display: block;  
      position: relative;
      font-size: 130px;
      bottom: 260%;
      left: 20%;
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
      padding-bottom: 20px;
      padding-left: 20em;
    }

     /* Search box padding*/
    #search-box{
      /*padding-left: 34.375em;*/
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
        <a href="admin-dashboard-hospital.php" id="first-sidebar" class="a"><img src="icons/menu/medical-center.png">Hospitals</a>
      </div>
      <div class="request">
        <a href="#" class="a"><img src="icons/menu/volunteer.png">Users</a>
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
          <div class="totalusers row">
            <div class="column">
            <?php
                $conn = mysqli_connect("localhost","root","","blood_donation_sys");
                if($conn->connect_error){ 
                  die("Connection failed:".$conn->connect_error); 
                } 
                $sql = "SELECT * FROM user"; 
                $result = $conn->query($sql);
                if ($result=mysqli_query($conn,$sql)) {
                     $rowcount=mysqli_num_rows($result);
                    echo "<b><h2 id='total-user-number'>".$rowcount."</h2></b>";
                }
            ?>
            </div>
            <div class="column" style="margin-top: 35px"> 
              <b><p id="text-right" style ="font-size: 30px">Users are in the database</p></b>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div class="table-header">
    <table>
      <th><h2>Users</h2></th>
    </table>
  </div>
  <div class="content">
    <table class="table-content" style="width: 90%">
      <tr>
        <th>Full Name</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Blood Type</th>
        <th>Age</th>
      </tr>
        <?php
        $conn = mysqli_connect("localhost","root","","blood_donation_sys");
        if($conn->connect_error){ 
          die("Connection failed:".$conn->connect_error); 
        } 
        $sql = "SELECT User_Name,
        User_Address, User_Contact_Number,User_Blood_Type,User_Age FROM user"; 
        $result = $conn->query($sql);

        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
            echo "<tr><td>".$row["User_Name"]."</td><td>".$row["User_Address"]."</td><td>".$row["User_Contact_Number"]."</td><td>".$row["User_Blood_Type"]."</td><td>".$row["User_Age"]."</td></tr>";
          }
          echo"</table>";
        }
        else{
          echo "0 result";
        }
        $conn->close();
        ?>
  </div>

  
  
</body>
</html>



<?php
}else{
    send_alert_error("Session Invalid");

}


?>


