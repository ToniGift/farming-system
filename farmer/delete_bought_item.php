<?php 
    session_start();
    if (!isset($_SESSION['farmer'])) {
    header('location: ../');
    }

    if (!isset($_GET['id'])) {
        header('location: bought_items.php');
    }
    $id = $_GET['id'];
    include_once '../core/bought_goods.class.php';
    $bought_good_obj = new bought_goods();

    $bought_good = $bought_good_obj->fetch_bought_good($id);
    if (empty($bought_good)) {
        header('location: bought_items.php');
    }

    $bought_good_obj->delete_bought_good($id);

    header('location: bought_items.php');
?>