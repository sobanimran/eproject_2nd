<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user7-128x128.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
      <?php 
          if(isset($_SESSION['auth'])){
            $usr_name=  $_SESSION['auth-user']['usr_name'];
          }
          else{
            $usr_name= "not Logged in"; 
          }
          ?>
        <a href="#" class="d-block text-uppercase"><strong><?= $usr_name ?></strong></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item" >
          <a href="index.php" class="nav-link  <?= $pagname!='index'?'':'active ' ?>">
            <i class="nav-icon  fas fa-tachometer-alt"></i>
            <p >
              Dashboar

            </p>
          </a>
         

        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link  <?= $pagname!='index'?'active':' ' ?>">
            <i class="fas fa-book nav-icon"></i>
            <p>Collection</p>
            <i class="right fas fa-angle-left"></i>
          </a>
          <ul class="nav nav-treeview  ">
            <li class="nav-item  ">
              <a href="category.php" class="nav-link <?= $pagname=='category'?'active':' ' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="product.php" class="nav-link <?= $pagname=='product'?'active':' ' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Products</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="brand.php" class="nav-link <?= $pagname=='brand'?'active':' ' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Brands</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">Settings</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              Admin profile
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="registered.php" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Registered users
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
            <p>
              Role for users
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
