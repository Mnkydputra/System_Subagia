<?php if ($this->session->flashdata('sukses')) { ?>
		<script type="text/javascript">
			Swal.fire({
				title: 'Berhasil!',
				text: 'Anda Berhasil Masuk',
				icon: 'success',
				confirmButtonText: 'Cool'
			})
		</script>

	<?php } ?>
  <div id="responsive" class="container-fluid ">
      <div class="col-xl-12 col-sm-6 mb-4  alert alert-success" role="alert">
            <h3 class="bi bi-grid-fill"><?php echo date('d M Y , '); ?></h3>       
          <div class="alert alert-success border-0" role="alert">
            <h4 class="alert-heading">Selamat Datang <?= $akun->nama ?>!</h4>
            <!-- Tambahkan Session login nama, dan level  -->
            <p> <b>Selamat Datang di Enterprise Resource Planning PT. XYZ</b></p> 
        </div>
    </div>

      <div class="row">
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Inventory</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Stock Barang 10</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Driver</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Driver Active 4</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Progress</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Barang Dikirim 2</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>

  </div>