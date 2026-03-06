<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/sales.class.php';
	include_once '../../core/core.function.php';

	$session = new Session();
	$sale_obj = new Sales();

	if (isset($_POST['product_id'])) {
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		$total_amount = $_POST['total_amount'];

		if ($sale_obj->update_sale($quantity,$total_amount,$id)) {
			echo 1;
		}
		else{
			echo displayDanger("Unexpected Error");
		}
	}
	else{
		echo "string";
	}
?>
