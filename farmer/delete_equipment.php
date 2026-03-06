<?php 
    session_start();
    if (!isset($_SESSION['farmer'])) {
    header('location: ../');
    }

    if (!isset($_GET['id'])) {
        header('location: equipments.php');
    }
    $id = $_GET['id'];
    include_once '../core/equipments.class.php';
    $equipment_obj = new equipments();

    $equipment = $equipment_obj->fetch_equipment($id);
    if (empty($equipment)) {
        header('location: equipments.php');
    }

    $equipment_obj->delete_equipment($id);

    header('location: equipments.php');
?>