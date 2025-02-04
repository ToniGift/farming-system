<?php 
    session_start();
    if (!isset($_SESSION['farmer'])) {
    header('location: ../');
    }

    if (!isset($_GET['id'])) {
        header('location: products_list.php');
    }
    $id = $_GET['id'];
    include_once '../core/products.class.php';
    $product_obj = new Products();

    $product = $product_obj->fetch_product($id);
    if (empty($product)) {
        header('location: products_list.php');
    }

    $product_obj->delete_product($id);

    header('location: products_list.php');
?>