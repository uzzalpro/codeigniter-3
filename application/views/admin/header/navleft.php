
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/profile/'.$_SESSION['aPhoto'])?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo site_url('admin/editUserProfile/'.$_SESSION['aId'])?>" class="d-block"><?php echo $_SESSION['aFirst_name']; ?></a>
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
          <li class="nav-item menu-open">
            <a href="<?php echo site_url('admin/all_Users')?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('admin/allProducts')?>" class="nav-link active">
                <i class="fa-solid fa-tags"></i>
                  <p> All Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('admin/newProduct')?>" class="nav-link">
                <i class="fa-sharp fa-solid fa-folder-plus"></i>
                  <p> Add Product</p>
                </a>
              </li>

            </ul>
          </li>
          
 

          <li class="nav-header">User</li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/RegisterAuser')?>" class="nav-link">
            <i class='fas fa-user-graduate'></i>
              <p>Create Admin</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/changePassword')?>" class="nav-link">
            <i class="fa-solid fa-key"></i>
              <p>Change Password</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/editUserProfile/'.$_SESSION['aId'])?>" class="nav-link">
            <i class="fa fa-gear"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/logOut') ?> " class="nav-link">
            <i class="fa fa-sign-out"></i>
              <p>log out</p>
            </a>
          </li>
          
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  