<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="assets/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0"><?php echo $_SESSION['farmer']['username'] ?></h6>
            <span class="pro-user-desc">Farmer</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
            aria-expanded="false">
            <span data-feather="chevron-down"></span>
        </a>
        <div class="dropdown-menu profile-dropdown">
            <a href="#" class="dropdown-item notify-item">
                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                <span>My Account</span>
            </a>

            <div class="dropdown-divider"></div>

            <a href="logout.php" class="dropdown-item notify-item">
                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>
<div class="sidebar-content">
    <!--- Sidemenu -->
    <div id="sidebar-menu" class="slimscroll-menu">
        <ul class="metismenu" id="menu-bar">
            <li class="menu-title">Navigation</li>

            <li>
                <a href="dashboard.php">
                    <i data-feather="home"></i>
                    <!-- <span class="badge badge-success float-right">1</span> -->
                    <span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i data-feather="box"></i>
                    <span> Products </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="products_list.php">Products</a>
                    </li>
                    <li>
                        <a href="add_product.php">Add Product</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i data-feather="box"></i>
                    <span> Sales Records </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="sales_records.php">Sales Records</a>
                    </li>
                    <li>
                        <a href="add_sales_record.php">Add Sales Record</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript: void(0);">
                    <i data-feather="box"></i>
                    <span> Equipments </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="equipments.php">Equipments</a>
                    </li>
                    <li>
                        <a href="add_equipment.php">Add Equipment</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript: void(0);">
                    <i data-feather="box"></i>
                    <span> Bought Items </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="bought_items.php">Bought Items</a>
                    </li>
                    <li>
                        <a href="add_bought_item.php">Add Bought Item</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
</div>
<!-- Sidebar -left -->

</div>