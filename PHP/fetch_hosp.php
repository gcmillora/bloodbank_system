<?php
    include 'db_conn.php';

    $columnName = $_POST['columnName'];
    $sort = $_POST['sort'];
    $html = "";

    $sql = "SELECT Hospital_Name,
        Hospital_Address, Hospital_Contact_Number FROM hospital
        ORDER BY ".$columnName." ".$sort.""; 
    $result = $conn->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $html .= "<tr><td>".$row["Hospital_Name"]."</td>
            <td>". $row["Hospital_Address"]."</td>
            <td>". $row["Hospital_Contact_Number"]."</td></tr>";
        }
        echo $html;
    }
    else echo "0 results";
    mysqli_close($conn);
?>