<?php 
  session_start();
  if (isset($_SESSION['farmer'])) {
    header('location: farmer/dashboard.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php' ?>

<?php include 'navbar.php' ?>

<!-- Start Service Area -->
<section class="htc__service__area bg__gray ptb--120">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title text-center foo">
                    <h2 class="title__line">Farm System Management &dash; <span class="text--theme">Register</span></h2>
                    <p>We will need these basic details to add you as a farmer.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <form class="my-3 foo" id="registerForm" method="post">

            <div class="card">
                <div class="card-text">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" required name="fullname" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" required name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" required name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" required name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea rows="3" required name="address" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success">Register</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>
<!-- End Service Area -->
<!-- Start CounterUp Area -->
<!-- End CounterUp Area -->
<?php include 'footer.php' ?>