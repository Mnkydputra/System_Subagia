
<div id="responsive" class="container-fluid ">
  <div class="row">
    <div class="col-12">
      <div class="card card-chart">
        <div class="card-header">
          <div class="row">
            <div class="col-sm-6 text-left">
              <h5 class="card-category">Product</h5>
            </div>
            <div class="col-12">
              <form enctype="multipart/form-data" class="form-horizontal"  method="post" action="<?= base_url('i/Input_product/VolumeProduct')?>">
              <div class="form-group">
                  <input type="hidden" name="po_number" id="po_number" value="<?= $product->po_number?>">
                </div>  
              <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="id_volume_product">ID Volume Product</label>
                            <input type="text" readonly id="id_volume_product" name="id_volume_product"  class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="id_product">ID Product</label>
                            <input type="text" readonly id="id_product" name="id_product" value="<?= $product->id_product?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="sales_partner">ID Sales Partner</label>
                            <input type="text" readonly id="sales_partner" name="sales_partner" value="<?= $product->id_sales_partner?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="shipref">Shipref</label>
                            <input type="text" readonly id="shipref" name="shipref" value="<?= $product->shipref?>" class="form-control">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="product_number">Product Number</label>
                            <input type="text" readonly id="product_number" name="product_number" required value="<?= $product->product_name?>" class="form-control">
                        </div>
                    </div>
                 <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="long">Long</label>
                            <input type="text"  id="long" name="long" Placeholder="Long Product" required class="form-control">
                        </div>
                       <div class="form-group col-md-6">
                        <label for="weight">Weight</label>
                            <input type="text"  id="weight" name="weight" required placeholder="Weight Product" class="form-control">
                       </div>

                       <div class="form-group col-md-6">
                        <label for="height">Height</label>
                            <input type="text"  id="height" name="height" required placeholder="Height Product"  class="form-control">
                       </div>
                       <div class="form-group col-md-6">
                        <label for="pallet">Pallet</label>
                            <input type="text"  id="pallet" name="pallet" required placeholder="Pallet" class="form-control">
                       </div>
                       <div class="form-group col-md-6">
                        <label for="cbm">CBM</label>
                            <input type="text" readonly id="cbm" name="cbm" required placeholder="Cbm Product" class="form-control">
                       </div>
                       <div class="form-group col-md-6">
                        <label for="total_cbm">Total CBM</label>
                            <input type="text" readonly  id="total_cbm" name="total_cbm"  required  placeholder="Total CBM" class="form-control">
                       </div>
                       <div class="form-group col-md-6">
                        <label for="tanggal">Tanggal</label>
                            <input type="text"  id="tanggal" name="tanggal" required  placeholder="tanggal" class="form-control">
                       </div>
                 </div>   

                <button style="float:right" type="submit"  class="btn btn-primary"> Submit  </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <?php if ($this->session->flashdata('sukses')) { ?>
		<script type="text/javascript">
			Swal.fire({
                    icon: 'success',
                    title: 'Good Job',
                    text:   'sukses',
                    footer: '<a href="<?= base_url('i/Dashboard')?>">Apakah semua sudah benar?</a>'
            })
		</script>

	<?php } ?>

    <script type="text/javascript">
       $(document).ready(function(){
           $('#sales_partner,#product_number').keyup(function(){
            var sales_partner         = $("#sales_partner").val();
            var product_number        = $("#product_number").val();
            var pemisah               = '-';
            var id_product            = sales_partner + pemisah + product_number;
            $('#id_volume_product').val(id_product);
             
           });
       });

        $(document).ready(function() {
        $("#long, #weight, #height, #pallet").keyup(function() {
            var long  = $("#long").val();
            var weight = $("#weight").val();
            var hight   = $("#height").val();
            var pallet = $("#pallet").val();
            var bagi    = 1000000;
            var cbm = parseInt(long) * parseInt(weight) * parseInt(hight) / parseInt(bagi);
            var TotalCBM = Math.floor((Math.pow(10, 2)*cbm)+0.5)*Math.pow(10, -2); 
            $("#cbm").val(cbm);
            $("#total_cbm").val(parseFloat(TotalCBM) * parseInt(pallet));
        });
        });
    </script>