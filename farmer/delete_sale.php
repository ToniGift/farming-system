<?php 
    session_start();
    if (!isset($_SESSION['farmer'])) {
    header('location: ../');
    }

    if (!isset($_GET['id'])) {
        header('location: sales_records.php');
    }
    $id = $_GET['id'];
    include_once '../core/sales.class.php';
    $sale_obj = new Sales();

    $sale = $sale_obj->fetch_sale($id);
    if (empty($sale)) {
        header('location: sales_records.php');
    }

    $sale_obj->delete_sale($id);

    header('location: sales_records.php');
?>