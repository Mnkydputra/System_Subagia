<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/')?>bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/')?>custome.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/')?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/')?>bootstrap-grid.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/')?>bootstrap-grid.min.css">  
    <title>System</title>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/')?>bootstrap.js"></script>
    <script src="<?= base_url('assets/js/')?>bootstrap.min.js"></script>
    <!-- glictbox -->
    <link rel="stylesheet" href="<?= base_url('assets/css/')?>glightbox.min.css" />
    <script src="<?= base_url('assets/js/')?>glightbox.min.js"></script>
    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        #responsive 
        {
          margin-top:0;
          padding-top:100px;
          position:absolute;
        }
    </style>
  </head>
  <body>
   <div id="wrapper" class="toggled">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a href="#">
          SYSTEM
          </a>
        </li>
        <li>
          <a href="#">Dashboard</a>
        </li>
        <li>
          <a href="#">Shortcuts</a>
        </li>
        <li>
          <a href="#">Overview</a>
        </li>
        <li>
          <a href="#">Events</a>
        </li>
        <li>
          <a href="#">About</a>
        </li>
        <li>
          <a href="#">Services</a>
        </li>
        <li>
          <a href="#">Contact</a>
        </li>
      </ul>
    </div>
    <!-- /#sidebar-wrapper -->
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#8c6583;">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="bi bi-grid-fill"></i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">SYSTEM<span class="sr-only"></span></a>
              </li>
            </ul>
          <div class="dropdown nav-item"> 
          <a href="#" class=" btn btn-default dropdown-toggle" data-toggle="dropdown">    
            <?= $akun->nama?></a>
              <ul class="dropdown-menu dropdown-navbar">
                <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a></li>
                <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
                <li class="nav-link"><a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-item dropdown-item">Log out</a></li>
              </ul>
          </div>
          </div>
        
        </nav>
    </header>

    <!-- content -->
      <div id="responsive" class="container-lg-12 ml-5 mt-3 mr-2">
         
            <div class="row"><br>
              <div class="col-lg-11">
                
                <div class="card-deck">
                  <div class="col-sm">
                    <a href="#" class="card border-0" data-toggle="modal" data-target="#Ceklogin" class="nav-item dropdown-item"> 
                      <img src="<?php echo base_url('assets/img/')?>Inventory.png" class="card-img-top" alt="inventory">
                      <div class="card-body">
                        <span class="card-title" style="color:black;">Inventory</span>
                      </div>
                    </a>
                    </div>

                    <div class="col-sm">
                    <a href="#" class="card border-0" data-toggle="modal" data-target="#Ceklogin" class="nav-item dropdown-item">
                      <img src="<?php echo base_url('assets/img/')?>Delivery_order.png" class="card-img-top" alt="inventory">
                      <div class="card-body">
                        <span class="card-title" style="color:black;">Finance</span>
                      </div>
                    </a>
                    </div>

                    <div class="col-sm">
                    <a href="#" class="card border-0" data-toggle="modal" data-target="#Ceklogin" class="nav-item dropdown-item"> 
                      <img src="<?php echo base_url('assets/img/')?>Prosseing_requirments.png" class="card-img-top" alt="inventory">
                      <div class="card-body">
                        <span class="card-title" style="color:black;"> Management</span>
                      </div>
                    </a>
                    </div>

                      <div class="col-sm">
                      <a href="#" class="card border-0" data-toggle="modal" data-target="#Ceklogin" class="nav-item dropdown-item"> 
                        <img src="<?php echo base_url('assets/img/')?>Hr.png" class="card-img-top" alt="inventory">
                        <div class="card-body">
                          <span class="card-title" style="color:black;"> Human Resource</span>
                        </div>
                      </a>
                      </div>

                      <div class="col-sm">
                      <a href="#" class="card border-0" data-toggle="modal" data-target="#Ceklogin" class="nav-item dropdown-item"> 
                        <img src="<?php echo base_url('assets/img/')?>Production.png" class="card-img-top" alt="inventory">
                        <div class="card-body">
                          <span class="card-title" style="color:black;"> Production</span>
                        </div>
                      </a>
                      </div>

                  </div>
              </div>
            </div>
      </div>


      <div class="alert">
			<?php if ($this->session->flashdata("nouser")) { ?>
				<span style="color:red">user tidak di temukan</span>
			<?php } else if ($this->session->flashdata('info')) { ?>
				<small style="color:red"><?= $this->session->flashdata('info'); ?></small>
			<?php } ?>
		  </div>
    