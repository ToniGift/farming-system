<?php 
session_start();
if (!isset($_SESSION['farmer_admin'])) {
    header('location: ./');
    exit();
}

include_once '../core/farmers.class.php';
include_once '../core/sales.class.php';
include_once '../core/products.class.php';

$farmer_obj = new Farmers();
$product_obj = new Products();
$sale_obj = new Sales();

$farmers_num = $farmer_obj->farmers_num();
$products_num = $product_obj->products_num();
$sales_num = $sale_obj->sales_num();
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'components/head.php'; ?>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include_once 'components/header.php'; ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include_once 'components/sidebar.php'; ?>
        
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Dashboard</h4>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-md-4 col-xl-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="media p-3">
                                        <div class="media-body">
                                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                                            farmers</span>
                                            <h2 class="mb-0"><?php echo $farmers_num ?></h2>
                                        </div>
                                        <div class="align-self-center">
                                            <div id="today-revenue-chart" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="media p-3">
                                        <div class="media-body">
                                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">products</span>
                                            <h2 class="mb-0"><?php echo $products_num ?></h2>
                                        </div>
                                        <div class="align-self-center">
                                            <div id="today-new-visitors-chart" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xl-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="media p-3">
                                        <div class="media-body">
                                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                                           sales</span>
                                            <h2 class="mb-0"><?php echo $sales_num ?></h2>
                                        </div>
                                        <div class="align-self-center">
                                            <div id="today-new-customer-chart" class="apex-charts"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- content -->
            <?php include_once 'components/footer.php'; ?>
        </div>
    </div>
</body>
</html>