<?php 
  session_start();
  if (!isset($_SESSION['farmer'])) {
    header('location: ../');
  }

  include_once '../core/sales.class.php';
  $sale_obj = new Sales();
  $farmer_id = $_SESSION['farmer']['id'];
  $sales = $sale_obj->fetch_farmer_sales($farmer_id);
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
                                <h4 class="mb-1 mt-0">Sales List</h4>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mt-0 mb-4">Sales you have made</h4>
                                        <!-- <p class="sub-header"></p> -->


                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Total Amount</th>
                                                    <th>Time Sold</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php foreach ($sales as $sale): ?>
                                                    <tr>
                                                        <td><?php echo $sale['product_name'] ?></td>
                                                        <td><?php echo $sale['quantity'] ?></td>
                                                        <td><?php echo $sale['total_amount'] ?></td>
                                                        <td><?php echo $sale['time_sold'] ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-warning" href="edit_sale.php?id=<?php echo $sale['id'] ?>">Edit</a>
                                                            <a class="btn btn-sm btn-danger" href="delete_sale.php?id=<?php echo $sale['id'] ?>">Delete</a>
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