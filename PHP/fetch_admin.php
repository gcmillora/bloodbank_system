<?php
    include 'db_conn.php';
    $columnName = $_POST['columnName'];
    $sort = $_POST['sort'];
    $html = "";

    $sql = "SELECT User_Name,
    User_Address, User_Contact_Number,User_Blood_Type,User_Age FROM user
    ORDER BY ".$columnName." ".$sort.""; 
    $result = $conn->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $html .="<tr><td>".$row["User_Name"]."</td>
            <td>".$row["User_Address"]."</td>
            <td>".$row["User_Contact_Number"]."</td>
            <td>".$row["User_Blood_Type"]."</td>
            <td>".$row["User_Age"]."</td></tr>";
        }
        echo $html;
    }
    else echo "0 results";
?>