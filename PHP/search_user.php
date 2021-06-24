<?php
    include 'db_conn.php';
    $columnName = $_POST['filter'];
    $key = $_POST['value'];
    $html = "";

    $sql = "SELECT User_Name,
    User_Address, User_Contact_Number,User_Blood_Type,User_Age FROM user
    WHERE ".$columnName." LIKE '%".$key."%'
    ORDER BY ".$columnName." ASC"; 
    $result = $conn->query($sql);

    if($result !== false && $result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $html .="<tr><td>".$row["User_Name"]."</td>
            <td>".$row["User_Address"]."</td>
            <td>".$row["User_Contact_Number"]."</td>
            <td>".$row["User_Blood_Type"]."</td>
            <td>".$row["User_Age"]."</td></tr>";
        }
        echo $html;
    }
    else echo "<tr><td></td><td>0 results</td></tr>";
?>