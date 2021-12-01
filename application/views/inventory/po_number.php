<?php if ($this->session->flashdata('gagal')) { ?>
		<script type="text/javascript">
			Swal.fire({
				title: 'Gagal!',
				text: 'Sales Partner Telah Terdaftar',
				icon: 'warning',
				confirmButtonText: 'Cool'
			})
		</script>

	<?php } ?>
  <?php if ($this->session->flashdata('sukses')) { ?>
		<script type="text/javascript">
			Swal.fire({
				title: 'Berhasil!',
				text: 'Sales Partner Telah Terdaftar',
				icon: 'success',
				confirmButtonText: 'Cool'
			})
		</script>

	<?php } ?>
<div id="responsive" class="container-fluid ">
  <div class="row">
    <div class="col-12">
      <div class="card card-chart">
        <div class="card-header">
          <div class="row">
            <div class="col-sm-6 text-left">
              <h5 class="card-category">Data PO Number</h5>
            </div>
            <div class="col-12">
              <form  id="addDO"  enctype="multipart/form-data" class="form-horizontal"  method="post" action="<?= base_url('i/Input_product/Input_po')?>">
                <div class="form-group">
                    <input type="hidden"  id="id_po" name="id_po" placeholder="ID PO" class="form-control">
                </div>
                 <div class="form-group">
                    <input type="hidden"  id="id_sales" name="id_sales" value="<?= $sales->id_sales_partner?>" class="form-control">
                </div>
              <div class="form-row">


                 <div class="form-group col-md-6">
                   <label for="po_number">PO Number</label>
                    <input type="text"  id="po_number" name="po_number" placeholder="PO Number" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="short_name">Shortname Sales Partner</label>
                    <input type="text" readonly="" id="short_name" name="short_name" value="<?= $sales->sales_partner?>" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="awb">NO AWB</label>
                    <input type="text"  id="awb" name="awb" placeholder="Nomor Air Ways Bill" class="form-control">
                </div>
                </div>

                <button style="float:right" type="submit" class="btn btn-primary"> Submit  </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    $(function(){
      $("#addDO").on('submit', function(e){
        if(document.getElementById('po_number').value == ""){
          alert("PO Number Masih Kosong")
        }else if(document.getElementById('short_name').value=""){
          alert("Short Name Masih Kosong")
        }else if(document.getElementById('awb').value == ""){
          alert("No AWB Tidak Boleh Kosong")
        }else {
          $.ajax({
            beforeSend : function(){
              $("#submit").attr("disabled",true);
            },
            complete : function(){
              $("#submit").attr("disabled",false);
            },
          })
        }
      })
    })

</script>

