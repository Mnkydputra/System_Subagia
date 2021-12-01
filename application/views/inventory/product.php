
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
              <form enctype="multipart/form-data" class="form-horizontal"  method="post" action="<?= base_url('i/Input_product/addProduct')?>">
                <div class="form-group">
                    <input type="hidden"  id="id_po" name="id_po" placeholder="ID PO"  value="<?= $po->id_po?>" class="form-control">
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="po_number">PO Number</label>
                            <input type="text" readonly id="po_number" name="po_number" value="<?= $po->po_number?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="sales_partner">ID Sales Partner</label>
                            <input type="text" readonly id="sales_partner" name="sales_partner" value="<?= $po->id_sales_partner?>" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="awb">NO AWB</label>
                            <input type="text" readonly id="awb" name="awb" value="<?= $po->no_awb?>" class="form-control">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="id_product">ID Product</label>
                            <input type="text" readonly id="id_product" name="id_product" required placeholder="Product Number" class="form-control">
                        </div>
                    </div>
                 <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="shipref">Shipreft</label>
                            <input type="text"  id="shipref" name="shipref" Placeholder="Shipreft Number" required class="form-control">
                        </div>
                       <div class="form-group col-md-6">
                        <label for="product_number">Product Number</label>
                            <input type="text"  id="product_number" name="product_number" required placeholder="Product Number" class="form-control">
                       </div>

                       <div class="form-group col-md-6">
                        <label for="description">Description</label>
                            <input type="text"  id="description" name="description" required placeholder="Description Product"  class="form-control">
                       </div>
                       <div class="form-group col-md-6">
                        <label for="container">Container</label>
                            <input type="text"  id="container" name="container" required placeholder="Container" class="form-control">
                       </div>
                       <div class="form-group col-md-6">
                        <label for="store_loc">Storage Location</label>
                            <input type="text"  id="store_loc" name="store_loc" required placeholder="Storage Location" class="form-control">
                       </div>
                       <div class="form-group col-md-6">
                        <label for="type">Type</label>
                            <input type="text"  id="type" name="type"  required  placeholder="Type" class="form-control">
                       </div>
                       <div class="form-group col-md-6">
                        <label for="quantity">Quantity</label>
                            <input type="text"  id="quantity" name="quantity" required  placeholder="Quantity" class="form-control">
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
           $('#shipref,#product_number').keyup(function(){
            var shipref         = $("#shipref").val();
            var product_number  = $("#product_number").val();
            var pemisah         = '-';
            var id_product      = shipref + pemisah + product_number;
            $('#id_product').val(id_product);
           });
       });
    </script>