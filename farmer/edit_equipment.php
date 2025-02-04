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
$equipment_obj = new Equipments();
$farmer_id = $_SESSION['farmer']['id'];
$equipment = $equipment_obj->fetch_equipment($id);


if (empty($equipment)) {
    header('location: equipments.php');
}

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

        <?php include_once 'components/sidebar.php'; ?>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Update Equipment - <?php echo $equipment['equipment'] ?></h4>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3 header-title mt-0">Equipment Details</h4>

                                    <form class="form-horizontal" id="updateEquipmentForm" method="post">
                                        
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-3 col-form-label">Equipment</label>
                                            <div class="col-9">
                                                <input type="text" value="<?php echo $equipment['equipment'] ?>" required name="equipment" class="form-control">
                                            </div>
                                        </div><div class="form-group row mb-3">
                                            <label for="" class="col-3 col-form-label">Quantity</label>
                                            <div class="col-9">
                                                <input type="number" value="<?php echo $equipment['quantity'] ?>" min="1" required name="quantity" id="quantity" class="form-control">

                                                <input type="hidden" value="<?php echo $equipment['id'] ?>" required name="id">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-3 col-form-label">Status</label>
                                            <div class="col-9">
                                                <select required name="status" class="form-control">
                                                    <option><?php echo $equipment['status'] ?></option>
                                                    <option>Good Condition</option>
                                                    <option>Due For Repair</option>
                                                    <option>Fully Damaged</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-9">
                                                <button type="submit" class="btn btn-dark">Update Equipment</button>
                                            </div>
                                        </div>
                                        <div class="form-group" id="messageArea"></div>
                                    </form>

                                </div>  <!-- end card-body -->
                            </div>  <!-- end card -->
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

    <script>
        $('#updateEquipmentForm').submit(function(e) {
            $('#messageArea').fadeOut();
            e.preventDefault();
            $.ajax({
                url:'php/update_equipment.php',
                type: 'POST',
                data : $('#updateEquipmentForm').serialize(),
                beforeSend: function(){
                    $('#messageArea').text('Loading');
                },
                success: function(data){
                    if (data == 1) {
                        window.location.href = 'equipments.php';
                    }
                    else{
                        $('#messageArea').html(data);
                    }
                }
            })
            $('#messageArea').fadeIn();
        });
    </script>
</body>
</html>