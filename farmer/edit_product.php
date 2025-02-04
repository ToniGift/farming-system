<?php 
    session_start();
    if (!isset($_SESSION['farmer'])) {
    header('location: ../');
    }

    if (!isset($_GET['id'])) {
        header('location: products_list.php');
    }
    $id = $_GET['id'];
    include_once '../core/products.class.php';
    $product_obj = new Products();

    $product = $product_obj->fetch_product($id);
    if (empty($product)) {
        header('location: products_list.php');
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
                                <h4 class="mb-1 mt-0">Update Product - <?php echo $product['product_name'] ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-3 header-title mt-0">Product Details</h4>

                                        <form class="form-horizontal" id="updateProductForm" method="post">
                                            <div class="form-group row mb-3">
                                                <label for="" class="col-3 col-form-label">Product Name</label>
                                                <div class="col-9">
                                                    <input value="<?php echo $product['product_name'] ?>" type="text" required name="product_name" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="" class="col-3 col-form-label">Price (&#8358;)</label>
                                                <div class="col-9">
                                                    <input value="<?php echo $product['price'] ?>" type="number" required name="price" class="form-control" id="">
                                                    <input type="hidden" value="<?php echo $product['id'] ?>" name="id" >
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="" class="col-3 col-form-label">Product Description</label>
                                                <div class="col-9">
                                                    <textarea required name="description" rows="5" class="form-control" id=""><?php echo $product['description'] ?></textarea> 
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label for="" class="col-3 col-form-label">Status</label>
                                                <div class="col-9">
                                                    <select required name="status" class="form-control" id="">
                                                        <option value="<?php echo $product['status'] ?>">
                                                            <?php if ($product['status'] == 1): ?>
                                                                Available
                                                            <?php endif ?>
                                                            <?php if ($product['status'] == 0): ?>
                                                                Not Available
                                                            <?php endif ?>
                                                                
                                                        </option>
                                                        <option value="1">Available</option>
                                                        <option value="0">Not Available</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group mb-0 justify-content-end row">
                                                <div class="col-9">
                                                    <button type="submit" class="btn btn-dark">Update Product</button>
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
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <?php include_once 'components/scripts.php'; ?>

        <script>
            $('#updateProductForm').submit(function(e) {
                $('#messageArea').fadeOut();
                e.preventDefault();
                $.ajax({
                    url:'php/update_product.php',
                    type: 'POST',
                    data : new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    beforeSend: function(){
                        $('#messageArea').text('Loading');
                    },
                    success: function(data){
                        if (data == 1) {
                            window.location.href = 'products_list.php';
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