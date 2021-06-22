<?php

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function send_alert_success_user($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../user-dashboard.php';";
        echo '</script>';
    }

    function send_alert_success_hospital($message){
        echo '<script language="javascript">';
        echo 'alert("',$message,'");';
        echo "window.location.href='../hospital-dashboard.php';";
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
			$sql_user = "SELECT * FROM user WHERE User_Email_Address='$email' AND User_Password='$password'";
			$sql_hospital = "SELECT * FROM hospital WHERE Hospital_Email_Address='$email' AND Hospital_Password='$password'";

			$result_user = mysqli_query($conn, $sql_user);
			$result_hospital = mysqli_query($conn, $sql_hospital);

			if(mysqli_num_rows($result_user)===1){
				$row = mysqli_fetch_assoc($result_user);

				if($row['User_Email_Address']===$email && $row['User_Password']===$password){
					$_SESSION['User_Name'] = $row['User_Name'];
					$_SESSION['User_ID'] = $row['User_ID'];
					send_alert_success_user("Log-in Successful!");
				}

			}else if(mysqli_num_rows($result_hospital)===1){
				$row = mysqli_fetch_assoc($result_hospital);

				if($row['Hospital_Email_Address']===$email && $row['Hospital_Password']===$password){
					$_SESSION['Hospital_Name'] = $row['Hospital_Name'];
					$_SESSION['Hospital_ID'] = $row['Hospital_ID'];
					send_alert_success_hospital("Log-in Successful!");
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