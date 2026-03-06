<?php 
  session_start();
  if (!isset($_SESSION['farmer'])) {
    header('location: ../');
  }

  include_once '../core/products.class.php';
  $product_obj = new Products();
  $farmer_id = $_SESSION['farmer']['id'];
  $products = $product_obj->fetch_farmer_products($farmer_id);
?>

<!DOCTYPE html>
<html lang="en">
    <link href="assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
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
                                <h4 class="mb-1 mt-0">Products List</h4>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mt-0 mb-4">Products you have added</h4>
                                        <!-- <p class="sub-header"></p> -->


                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php foreach ($products as $product): ?>
                                                    <tr>
                                                        <td><?php echo $product['product_name'] ?></td>
                                                        <td><?php echo $product['price'] ?></td>
                                                        <td><?php echo substr($product['description'], 0,100)?>...</td>
                                                        <td>
                                                            <?php if ($product['status'] == 1): ?>
                                                                <span class="text-success">Available</span>
                                                            <?php endif ?>
                                                            <?php if ($product['status'] == 0): ?>
                                                                <span class="text-warning">Not Available</span>
                                                            <?php endif ?>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-sm btn-warning" href="edit_product.php?id=<?php echo $product['id'] ?>">Edit</a>
                                                            <a class="btn btn-sm btn-danger" href="delete_product.php?id=<?php echo $product['id'] ?>">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>

                        <!-- content -->

                        <!-- widgets -->
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

        <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        
        <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables/buttons.print.min.js"></script>

        <script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables/dataTables.select.min.js"></script>

        <!-- Datatables init -->
        <script src="assets/js/pages/datatables.init.js"></script>  
    </body>
</html>