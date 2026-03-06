<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="#" class="navbar-brand mr-0 mr-md-2 logo">
            <span class="logo-lg">
                <img src="assets/images/logo.png" alt="" height="24" />
                <span class="d-inline h5 ml-1"><?php echo $_SESSION['farmer']['username'] ?></span>
            </span>
            <span class="logo-sm">
                <img src="assets/images/logo.png" alt="" height="24">
            </span>
        </a>

        <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
            <li class="">
                <button class="button-menu-mobile open-left disable-btn">
                    <i data-feather="menu" class="menu-icon"></i>
                    <i data-feather="x" class="close-icon"></i>
                </button>
            </li>
        </ul>

        <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
            <li class="d-none d-sm-block">
                <div class="app-search">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span data-feather="search"></span>
                        </div>
                    </form>
                </div>
            </li>
        </li>
    </ul>
</div>

</div>