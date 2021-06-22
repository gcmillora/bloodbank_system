<?php

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function send_alert_success($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../user-dashboard.php';";
        echo '</script>';
    }

    function send_alert_error($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../login.html';"; //healjksad//
        echo '</script>';
    }

	if(isset($_POST['email'])&&isset($_POST['password'])){
		session_start();
		include 'db_conn.php';

		$email = validate($_POST['email']);
		$password = validate($_POST['password']);

		if(empty($email)||empty($password)){
			send_alert_error("Log-in Error");

		}else{
			$sql = "SELECT * FROM user WHERE User_Email_Address='$email' AND User_Password='$password'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result)===1){
				$row = mysqli_fetch_assoc($result);

				if($row['User_Email_Address']===$email && $row['User_Password']===$password){
					$_SESSION['User_Name'] = $row['User_Name'];
					$_SESSION['User_ID'] = $row['User_ID'];
					send_alert_success("Log-in Successful!");
				}



			}else{
				send_alert_error("Account does not exist");
			}
		}
	}else{
		send_alert_error("Log-in Error");
		//header("Location: login.html");
	}

?>