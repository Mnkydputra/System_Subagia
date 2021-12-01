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
              <h5 class="card-category">Data Sales Partner</h5>
            </div>
            <div class="col-12">
              <div class="form-group">
                  <button type="button" data-toggle="modal" data-target="#selectBarang" class="btn btn-primary">Cari Sales Partner <i class="tim-icons icon-zoom-split"></i></button>
                </div>
              <form  id="addDO"  enctype="multipart/form-data" class="form-horizontal"  method="post" action="<?= base_url("i/Input_product/sales_partner")?>">
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="id_sales">Sales ID</label>
                    <input type="text"  id="id_sales" name="id_sales" placeholder="Sales ID" class="form-control">
                </div>

                 <div class="form-group col-md-6">
                   <label for="shipref">Sales Partner</label>
                    <input type="text"  id="sales_partner" name="sales_partner" placeholder="Name Of Sales Partner" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="short_name">Shortname Sales Partner</label>
                    <input type="text"  id="short_name" name="short_name" placeholder="Short Name" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="storage_location">Storage Location</label>
                    <input type="text"  id="storage_location" name="storage_location" placeholder="Storage Location" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="name">Nama Sales Partner</label>
                    <input type="text"  id="name" name="name" placeholder="Nama Sales Partner" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="phone">Phone Sales Partner</label>
                    <input type="text"  id="phone" name="phone" placeholder="Nomor Telephone" class="form-control">
                </div>

                </div>

                <button style="float:right" type="submit" class="btn btn-primary"> Submit  </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="selectBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            Data Barang
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
          </div>
          <div class="modal-body" id="barang">
              <table class="table" id="table_id">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Sales Partner</th>
                    <th>Sales Partner</th>
                    <th>Location Gudang</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; 
                  foreach ($sales_partner as $f) :?>
                  <tr>
                    <td><?= $no++?></td>
                    <td><a class="btn btn-raised btn-round btn-primary click" 
                        data-id_sales="<?= $f->id_sales_partner?>"
                        data-sales_partner="<?= $f->sales_partner?>"
                        data-short_name="<?= $f->short_name?>"
                        data-location="<?= $f->loc_gudang?>"
                        data-name="<?= $f->name?>"
                        data-phone="<?= $f->phone?>">
                        
                        
                        
                        <?= $f->id_sales_partner ?> 
                      </a>
                    </td>
                  <td><?= $f->sales_partner?></td>
                  <td><?= $f->loc_gudang?></td>
                </tr>
                  <?php endforeach?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
        </div>

  </div>
</div>


<script type="text/javascript">
    $(function(){
      $("#addDO").on('submit', function(e){
        if(document.getElementById('id_sales').value == ""){
          alert("Nama Product Masih Kosong")
        }else if(document.getElementById('sales_partner').value=""){
          alert("Product Number Masih Kosong")
        }else if(document.getElementById('short_name').value == ""){
          alert("Quantity Tidak Boleh Kosong")
        }else if(document.getElementById('storage_location').value == ""){
          alert("Quantity Tidak Boleh Kosong")
        }else if(document.getElementById('name').value == ""){
          alert("Quantity Tidak Boleh Kosong")
        }else if(document.getElementById('phone').value == ""){
          alert("Quantity Tidak Boleh Kosong")
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

     $('.click').on('click',function(e){
      document.getElementById("id_sales").value                 = $(this).attr("data-id_sales");
      document.getElementById("sales_partner").value            = $(this).attr("data-sales_partner");
      document.getElementById("short_name").value               = $(this).attr("data-short_name");
      document.getElementById("storage_location").value         = $(this).attr("data-location");
      document.getElementById("name").value                     = $(this).attr("data-name");
      document.getElementById("phone").value                    = $(this).attr("data-phone");
      $('#selectBarang').modal('hide');
    })
</script>

