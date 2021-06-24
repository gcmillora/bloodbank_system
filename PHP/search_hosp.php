<?php

include 'db_conn.php';

$columnName = $_POST['filter'];
$key = $_POST['value'];
$html = "";

$sql = "SELECT Hospital_Name,
    Hospital_Address, Hospital_Contact_Number FROM hospital
    WHERE ".$columnName." LIKE '%".$key."%'
    ORDER BY ".$columnName." ASC"; 
$result = $conn->query($sql);

if($result !== false && $result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $html .= "<tr><td>".$row["Hospital_Name"]."</td>
        <td>". $row["Hospital_Address"]."</td>
        <td>". $row["Hospital_Contact_Number"]."</td></tr>";
    }
    echo $html;
}
else echo "<tr><td></td><td>0 results</td></tr>";
mysqli_close($conn);

?>