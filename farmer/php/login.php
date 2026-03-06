<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/farmers.class.php';
	include_once '../../core/core.function.php';

	$session = new Session();
	$farmers = new Farmers();

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		if ($farmers->farmer_login($email,$password)) {
			$farmer = $farmers->fetch_farmer($email);
			$session->create_session('farmer',$farmer);
			echo 1;
		}
		else{
			echo displayError('Invalid Credentials');
		}
	}
	else{
		echo "string";
	}
?>