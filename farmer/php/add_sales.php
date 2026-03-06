<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/sales.class.php';
	include_once '../../core/core.function.php';

	$session = new Session();
	$sale_obj = new Sales();

	if (isset($_POST['product_id'])) {
		$product_id = $_POST['product_id'];
		$quantity = $_POST['quantity'];
		$total_amount = $_POST['total_amount'];

		if ($sale_obj->add_sale($product_id,$quantity,$total_amount)) {
			echo 1;
		}
		else{
			echo displayDanger("Unexpected Error");
		}
	}
?>
