<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/equipments.class.php';
	include_once '../../core/core.function.php';

	$session = new Session();
	$equipment_obj = new Equipments();

	if (isset($_POST['equipment'])) {
		$equipment = $_POST['equipment'];
		$quantity = $_POST['quantity'];
		$status = $_POST['status'];
		$id = $_POST['id'];
		$farmer_id = $_SESSION['farmer']['id'];

		
		if ($equipment_obj->update_equipment($equipment,$quantity,$status,$id)) {
			echo 1;
		}
		else{
			echo displayDanger("Unexpected Error");
		}
	}
?>
