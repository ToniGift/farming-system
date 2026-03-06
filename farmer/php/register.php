<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/farmers.class.php';
	include_once '../../core/core.function.php';

	$session = new Session();
	$farmers = new Farmers();

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		$address = $_POST['address'];
		$username = $_POST['username'];
		$fullname = $_POST['fullname'];
		$password = md5($_POST['password']);

		if ($farmers->check_email($email) > 0) {
			echo displayWarning("Farmer with the same email already registered");
		}
		else{
			if ($farmers->register_farmer($fullname,$username,$email,$password,$address)) {

				$farmer = $farmers->fetch_farmer($email);
				$session->create_session('farmer',$farmer);
				echo 1;
			}
			else{
				echo displayDanger("Unexpected Error");
			}
		}
	}
	else echo "string";
?>
