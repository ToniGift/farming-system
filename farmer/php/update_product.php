<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/products.class.php';
	include_once '../../core/core.function.php';

	$product = new Products();

	if (isset($_POST['product_name'])) {
		$product_name = $_POST['product_name'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$status = $_POST['status'];
		$id = $_POST['id'];

		
		if ($product->update_product($product_name,$price,$description,$status,$id)) {
			echo 1;
		}
		else{
			echo displayDanger("Unexpected Error");
		}
	}
?>
