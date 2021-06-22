<?php

if(isset($_POST['fullName'])&&isset($_POST['age'])&&isset($_POST['sex'])&&isset($_POST['bloodType'])&&isset($_POST['address'])&&isset($_POST['contactNumber'])&&isset($_POST['email'])&&isset($_POST['password'])){
	include 'db_conn.php';

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function send_alert_success($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../login.html';";
        echo '</script>';
    }

    function send_alert_error($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../signup.html';";
        echo '</script>';
    }

	$fullname = validate($_POST['fullName']);
	$age = validate($_POST['age']);
	$sex = validate($_POST['sex']);
	$bloodType = validate($_POST['bloodType']);
	$address = validate($_POST['address']);
	$contactNumber = validate($_POST['contactNumber']);
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);																														
	// echo $fullname;
	// echo $age;
	// echo $bloodType;
	// echo $address;
	// echo $contactNumber;
	// echo $email;
	// echo $password;

	if(empty($fullname)||empty($age)||empty($sex)||empty($bloodType)||empty($address)||empty($contactNumber)||empty($email)||empty($password)){
		send_alert_error("Registration Failed");
		mysqli_close($conn);
	}else{
		$sql = "INSERT INTO user(User_Name, User_Age, User_Sex, User_Address, User_Contact_Number, User_Blood_Type, User_Email_Address, User_Password) VALUES('$fullname', '$age', '$sex', '$address', '$contactNumber', '$bloodType', '$email', '$password' )";
		$res = mysqli_query($conn, $sql);

		if($res){
			send_alert_success("Successfully Registered");
		}else{
			send_alert_error("Registration Failed");
			mysqli_close($conn);
		}
	}
	mysqli_close($conn);

}else{
	send_alert_error("Registration Failed");
	mysqli_close($conn);
}
	
?>	