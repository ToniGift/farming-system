<?php 
  session_start();
  if (!isset($_SESSION['farmer'])) {
    header('location: ../');
  }

  $farmer_id = $_SESSION['farmer']['id'];
  include_once '../core/bought_goods.class.php';
  include_once '../core/equipments.class.php';
  include_once '../core/products.class.php';
  include_once '../core/sales.class.php';

  $bought_good_obj = new Bought_goods();
  $equipment_obj = new equipments();
  $product_obj = new Products();
  $sale_obj = new Sales();

  $bought_goods = $bought_good_obj->fetch_farmer_bought_goods($farmer_id);
  $equipments = $equipment_obj->fetch_farmer_equipments($farmer_id);
  $products = $product_obj->fetch_farmer_products($farmer_id);
  $sales = $sale_obj->fetch_farmer_sales($farmer_id);
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
            
            <!-- Left Sidebar End -->

            <?php include_once 'components/sidebar.php'; ?>
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
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Products</span>
                                                <h2 class="mb-0"><?php echo count($products) ?></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-revenue-chart" class="apex-charts"></div>
                                                <!-- <span class="text-success font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-up'></i> 10.21%</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Equipments</span>
                                                <h2 class="mb-0"><?php echo count($equipments) ?></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-product-sold-chart" class="apex-charts"></div>
                                                <!-- <span class="text-danger font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-down'></i> 5.05%</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Sales Records</span>
                                                <h2 class="mb-0"><?php echo count($sales) ?></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-new-customer-chart" class="apex-charts"></div>
                                                <!-- <span class="text-success font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-up'></i> 25.16%</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Bought Items</span>
                                                <h2 class="mb-0"><?php echo count($bought_goods) ?></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-new-visitors-chart" class="apex-charts"></div>
                                                <!-- <span class="text-danger font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-down'></i> 5.05%</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- widgets -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body pt-2">
                                        <h5 class="mb-4">Products</h5>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($products as $product): ?>
                                                    <tr>
                                                        <td><?php echo $product['product_name'] ?></td>
                                                        <td><?php echo $product['price'] ?></td>
                                                        <td>
                                                            <?php if ($product['status'] == 1): ?>
                                                                Available
                                                            <?php endif ?>
                                                            <?php if ($product['status'] == 0): ?>
                                                                Not Available
                                                            <?php endif ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body pt-2">
                                        <h5 class="mb-4">Sales Records</h5>
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Total Amount</th>
                                                    <th>Quantity</th>
                                                    <th>Time Sold</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($sales as $sale): ?>
                                                    <tr>
                                                        <td><?php echo $sale['product_name'] ?></td>
                                                        <td><?php echo $sale['total_amount'] ?></td>
                                                        <td><?php echo $sale['quantity'] ?></td>
                                                        <td><?php echo $sale['time_sold'] ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                </div> <!-- content -->

                

                <!-- Footer Start -->
                <?php include_once 'components/footer.php'; ?>                
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <?php include_once 'components/scripts.php'; ?>

    </body>
</html>