<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="hospital-dashboard.css">
  <link rel="stylesheet" href="hospital-dashboard-home.css">
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
            <p><b>Drewzy Hospital</b></p>
            <small>Davao City</small>
          </div>
        </div>

    </div>

    <div class="menu">
      <div class="dashboard">
        <a href="#" id="first-sidebar" class="a"><img src="icons/menu/medical-center.png">Dashboard</a>
      </div>
      <div class="request">
        <a href="hospital-dashboard-request.html" class="a"><img src="icons/menu/volunteer.png">Requests</a>
      </div>
      <div>
        <a href="hospital-dashboard-outgoing.html" id="third-sidebar" class="a"><img src="icons/menu/blood-transfusion.png">Outgoing</a>
      </div>
      <div class="stock">
        <a href="hospital-dashboard-stock.html" class="a"><img src="icons/Hospital-Dashboard-Menu/blood-bag.png">Stock</a>
      </div>
      <div class="sidebar-bottom">
        <table>
          <th><a href="login.html" id="log-out">Log-out</a></th>
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
              mysqli_close($conn);
            ?></p></b>
          </div>
        </td>
        <td>
          <div class="total-outgoing">
            <h3 class="total-text">Outgoing</h3>
            <p class="total">Total</p>
            <b><p id="total-requested-number">10</p></b>
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
                  <td>10</td>
                  <td class="blood-type">AB+</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td class="blood-type">O-</td>
                  <td>2</td>
                  <td class="blood-type">AB-</td>
                  <td>2</td>
                </tr>
                <tr>
                  <td class="blood-type">A+</td>
                  <td>3</td>
                  <td class="blood-type">B+</td>
                  <td>3</td>
                </tr>
                <tr>
                  <td class="blood-type">A-</td>
                  <td>8</td>
                  <td class="blood-type">B-</td>
                  <td>8</td>
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
        INNER JOIN user on request.User_ID=user.User_ID"; 
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