<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/products.class.php';
	include_once '../../core/core.function.php';

	$session = new Session();
	$product_obj = new Products();

	if (isset($_POST['product_id'])) {
		$product_id = $_POST['product_id'];
		$quantity = $_POST['quantity'];

		
		$product = $product_obj->fetch_product($product_id);
		$price = $product['price'];

		echo $price * $quantity;
	}
?>
