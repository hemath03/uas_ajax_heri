  <!-- Main Sidebar Container -->
  <?php 
    $data = $this->db->get_where('pengguna' , [
      'username' => $this->session->userdata('username')
    ])->row_array();
   ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>asset/dist/img/lp3i.png" alt="AdminLTE Logo" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>UAS AJAX</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>asset/foto/MHS003.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php 
              if (isset($data['nama_user'])) {
                echo $data['nama_user'];  
              }
              else {
                redirect('auth');
              }
            ?>  
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li>
            <a href="<?php echo base_url()?>admin" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url()?>member" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Member    
              </p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url()?>peminjaman" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url()?>auth/ubah_password" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Password
              </p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt
              "></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
