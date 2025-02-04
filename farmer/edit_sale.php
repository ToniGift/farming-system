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
                            <h4 class="mb-1 mt-0">Update Sales Records</h4>
                        </div>
                    </div>

                    <!-- content -->

                    <!-- widgets -->
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3 header-title mt-0">Sales Records Details</h4>
                                    <form class="form-horizontal" id="updateSalesForm" method="post">
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-3 col-form-label">Product</label>
                                            <div class="col-9">
                                                <input readonly class="form-control" value="<?php echo $sale['product_name']?>" />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-3 col-form-label">Quantity Sold</label>
                                            <div class="col-9">
                                                <input value="<?php echo $sale['quantity']?>" type="number" min="1" required name="quantity" id="quantity" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-3 col-form-label">Total Amount (&#8358;)</label>
                                            <div class="col-9">
                                                <input type="number" value="<?php echo $sale['total_amount']?>" readonly required name="total_amount" id="total_amount" class="form-control">


                                                <input type="hidden" name="product_id" value="<?php echo $sale['product_id']?>" id="product_id">
                                                <input type="hidden" name="id" value="<?php echo $sale['id']?>" id="id">
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-9">
                                                <button type="submit" class="btn btn-dark">Update Sales Records</button>
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
        $('#quantity').keyup(function() {
            var quantity = $('#quantity').val();
            var product_id = $('#product_id').val();
            if (quantity !='') {
                $.ajax({
                    url:'php/get_product_price.php',
                    type: 'POST',
                    data : {product_id : product_id, quantity : quantity},
                    success: function(data){
                        if (data > 0) {
                            $('#total_amount').val(data);
                        }
                    }
                })
            }
            else{
                $('#total_amount').val('');
            }
        });
        $('#updateSalesForm').submit(function(e) {
            $('#messageArea').fadeOut();
            e.preventDefault();
            $.ajax({
                url:'php/update_sales.php',
                type: 'POST',
                data : $('#updateSalesForm').serialize(),
                beforeSend: function(){
                    $('#messageArea').text('Loading');
                },
                success: function(data){
                    if (data == 1) {
                        window.location.href = 'sales_records.php';
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