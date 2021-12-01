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
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.11.0/b-2.0.0/sl-1.3.3/datatables.min.css"/>
    <!-- Use -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/')?>bootstrap.js"></script>
    <script src="<?= base_url('assets/js/')?>bootstrap.min.js"></script>
    <!-- glictbox -->
    <link rel="stylesheet" href="<?= base_url('assets/css/')?>glightbox.min.css" />
    <script src="<?= base_url('assets/js/')?>glightbox.min.js"></script>
    <!-- SweetAlert -->
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
     <?php if($akun->role_id ==1 ){?>
            
              <ul class="sidebar-nav">
                 <li class="sidebar-brand">
                    <a href="#">Dashboard</a>
                  </li>

                  <li>
                    <a href="<?= base_url('f/')?>Dashboard">Dashboard</a>
                  </li>

                  <li>
                    <a href="<?= base_url('f/')?>#">Financial Report</a>
                  </li>

                  <li>
                    <a href="<?= base_url('f/')?>#">Account Payable</a>
                  </li>
                  <li>
                    <a href="<?= base_url('f/')?>#">Cost Management</a>
                  </li>
                  <li>
                    <a href="<?= base_url('f/')?>#">General Ledger</a>
                  </li>
                  <li>
                    <a href="<?= base_url('f/')?>#">Fixed Assets</a>
                  </li>
                  <li>
                    <a href="<?= base_url('f/')?>#">Cost Accounting</a>
                  </li>
                  <li>
                    <a href="<?= base_url('f/')?>#">Budgeting</a>
                  </li>
                </ul>
            
        <?php }else if($this->session->userdata('role_id')==2){ ?>
            <ul class="sidebar-nav">
                  <li class="sidebar-brand">
                    <a href="#">Dashboard</a>
                  </li>

                  <li>
                    <a href="<?= base_url('m/')?>#">Dashboard</a>
                  </li>

                  <li>
                    <a href="<?= base_url('m/')?>#">Quotation/Estimation</a>
                  </li>

                  <li>
                    <a href="<?= base_url('m/')?>#">Product Shipping</a>
                  </li>
                  <li>
                    <a href="<?= base_url('m/')?>#">Receive Payment</a>
                  </li>
                  <li>
                    <a href="<?= base_url('m/')?>#">Keep an Account</a>
                  </li>
                  <li>
                    <a href="<?= base_url('m/')?>#">Receive Order</a>
                  </li>
                </ul>
        <?php }else if($akun->role_id ==3){ ?>
            <ul class="sidebar-nav ">
                  <li class="sidebar-brand">
                    <a href="#">Dashboard</a>
                  </li>

                  <li >
                    <a href="<?= base_url('i/')?>Dashboard">Dashboard</a>
                  </li>

                  <li >
                    <a href="<?= base_url('i/')?>Data_rq">Data Requirment</a>
                  </li>

                  <li>
                    <a href="<?= base_url('i/')?>P_requirment">Prosessing Requirment</a>
                  </li>
                  <li>
                    <a href="<?= base_url('i/')?>Stock">Stock</a>
                  </li>
                                    <li>
                    <a href="<?= base_url('i/')?>Input_product">Input Product</a>
                  </li>
                </ul>
        <?php }else if($this->session->userdata('role_id')==4){?>
            <ul class="sidebar-nav">
                  <li class="sidebar-brand">
                    <a href="#">Dashboard</a>
                  </li>
                  <li>
                    <a href="<?= base_url('hr/')?>Dashboard">Dashboard</a>
                  </li>

                  <li>
                    <a href="<?= base_url('hr/')?>Data_rq">Driver</a>
                  </li>

                  <li>
                    <a href="<?= base_url('hr/')?>P_requirment">Employe Management</a>
                  </li>
                </ul>
        <?php }?>
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
    
    