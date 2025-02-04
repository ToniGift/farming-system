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
$bought_good_obj = new Bought_goods();
$farmer_id = $_SESSION['farmer']['id'];
$bought_good = $bought_good_obj->fetch_bought_good($id);


if (empty($bought_good)) {
    header('location: bought_items.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'components/head.php'; ?>
<body>
    <!-- Begin page -->
    <div id="wrapper">

        <?php include_once 'components/header.php'; ?>

        <?php include_once 'components/sidebar.php'; ?>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Update Bought Item - <?php echo $bought_good['good_name'] ?></h4>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3 header-title mt-0">Bought Item Details</h4>

                                    <form class="form-horizontal" method="post" id="updateBoughtItemForm">
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-3 col-form-label">Bought Item Name</label>
                                            <div class="col-9">
                                                <input type="text" value="<?php echo $bought_good['good_name'] ?>" required name="good_name" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-3 col-form-label">Price (&#8358;)</label>
                                            <div class="col-9">
                                                <input type="number" value="<?php echo $bought_good['price'] ?>" required name="price" class="form-control" id="">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-3 col-form-label">Quantity</label>
                                            <div class="col-9">
                                                <input type="number" value="<?php echo $bought_good['quantity'] ?>" required name="quantity" class="form-control" id="">
                                                <input type="hidden" value="<?php echo $bought_good['id'] ?>" required name="id" class="form-control" id="">
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-9">
                                                <button type="submit" class="btn btn-dark">Update Bought Item</button>
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
    </div>
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <?php include_once 'components/scripts.php'; ?>

    <script>
        $('#updateBoughtItemForm').submit(function(e) {
            $('#messageArea').fadeOut();
            e.preventDefault();
            $.ajax({
                url:'php/update_bought_item.php',
                type: 'POST',
                data : $('#updateBoughtItemForm').serialize(),
                beforeSend: function(){
                    $('#messageArea').text('Loading');
                },
                success: function(data){
                    if (data == 1) {
                        window.location.href = 'bought_items.php';
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