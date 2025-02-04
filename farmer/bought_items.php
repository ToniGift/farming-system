<?php 
  session_start();
  if (!isset($_SESSION['farmer'])) {
    header('location: ../');
  }

  include_once '../core/bought_goods.class.php';
  $equipment_obj = new Bought_goods();
  $farmer_id = $_SESSION['farmer']['id'];
  $bought_goods = $equipment_obj->fetch_farmer_bought_goods($farmer_id);
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
                                <h4 class="mb-1 mt-0">Bought Items List</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mt-0 mb-4">Bought Items you have added</h4>
                                        <!-- <p class="sub-header"></p> -->


                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Equipment</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Time Added</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <?php foreach ($bought_goods as $bought_item): ?>
                                                    <tr>
                                                        <td><?php echo $bought_item['good_name'] ?></td>
                                                        <td><?php echo $bought_item['quantity'] ?></td>
                                                        <td><?php echo $bought_item['price'] ?></td>
                                                        <td><?php echo $bought_item['time_added'] ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-warning" href="edit_bought_item.php?id=<?php echo $bought_item['id'] ?>">Edit</a>
                                                            <a class="btn btn-sm btn-danger" href="delete_bought_item.php?id=<?php echo $bought_item['id'] ?>">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
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