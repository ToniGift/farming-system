<?php 
session_start();
if (!isset($_SESSION['farmer_admin'])) {
    header('location: ./');
    exit();
}

include_once '../core/farmers.class.php';

$farmer_obj = new farmers();
$farmers = $farmer_obj->fetch_farmers();
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

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Farmers</h4>
                        </div>
                    </div>

                    
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-2">List of Registered Farmers</h4>
                                        <p></p>
                                        <table id="basic-datatable" class="table dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Email Address</th>
                                                    <th>Username</th>
                                                    <th>Address</th>
                                                    <th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($farmers as $farmer): ?>
                                                    <tr>
                                                        <td><?php echo $farmer['fullname'] ?></td>
                                                        <td><?php echo $farmer['email'] ?></td>
                                                        <td><?php echo $farmer['username'] ?></td>
                                                        <td><?php echo $farmer['address'] ?></td>
                                                        <td><a class="btn btn-primary" href="farmer?id=<?php echo $farmer['id'] ?>">View</a></td>
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
            <?php include_once 'components/footer.php'; ?>
        </div>
    </div>
</body>
</html>
<script src="assets/libs/select2/select2.min.js"></script>
<script src="assets/libs/multiselect/jquery.multi-select.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>


<!--Summernote js-->
<script src="assets/libs/summernote/summernote-bs4.min.js"></script>

<!-- Init js -->
<script src="assets/js/pages/form-editor.init.js"></script> 