<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/bought_goods.class.php';
	include_once '../../core/core.function.php';

	$session = new Session();
	$bought_good_obj = new Bought_goods();

	if (isset($_POST['good_name'])) {
		$good_name = $_POST['good_name'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$id = $_POST['id'];
		$farmer_id = $_SESSION['farmer']['id'];

		
		if ($bought_good_obj->update_bought_good($good_name,$price,$quantity,$id)) {
			echo 1;
		}
		else{
			echo displayDanger("Unexpected Error");
		}
	}
?>
