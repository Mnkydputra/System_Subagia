<div id="responsive" class="container-fluid ">
  <div class="row">
    <div class="col-12">
      <div class="card card-chart">
        <div class="card-header">
          <div class="row">
            <div class="col-sm-6 text-left">
              <h5 class="card-category">Requesting Delivery Order ca</h5>
            </div>
            <div class="col-12">
                <div class="form-group">
                  <button type="button" data-toggle="modal" data-target="#selectBarang" class="btn btn-primary">Cari Barang <i class="tim-icons icon-zoom-split"></i></button>
                </div>

              <form  id="addDO"  enctype="multipart/form-data" class="form-horizontal"  method="post">
                <div class="form-row">
                <div class="form-group">
                  <input type="hidden" name="id" id="id">
                </div> 

                <div class="form-group col-md-6">
                  <label for="awb">Nomor Air Way Bill</label>
                    <input type="text"  id="awb" name="awb" placeholder="No AWB" class="form-control">
                </div>

                 <div class="form-group col-md-6">
                   <label for="shipref">ShipRef</label>
                    <input type="text" readonly="" id="shipref" name="shipref" placeholder="Shipping Reference" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="product_number">Product Number</label>
                    <input type="text" readonly="" id="product_number" name="product_number" placeholder="Product Number" class="form-control">
                </div>

               <div class="form-group col-md-6">
                 <label for="sales_partner">Sales Partner</label>
                    <input type="text" readonly="" id="sales_partner" name="sales_partner" placeholder="Sales Partner" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="product_desc">Product Description</label>
                    <input type="text" readonly="" id="product_desc" name="product_desc" placeholder="Product Description" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="quantitybefore">Stock Quantity</label>
                  <input type="text" readonly="" id="quantitybefore" name="quantitybefore" placeholder="Quantity Before" class="form-control">
                </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="quantity">Quantity</label>
                  <input type="tel" id="quantity" name="quantity" placeholder="Quantity" class="form-control">
                </div>

                <div class="form-group col-md-3">
                  <label for="long">Long Product</label>
                  <input type="tel" id="long" name="long" placeholder="Long" class="form-control">
                </div>

                <div class="form-group col-md-3">
                  <label for="weight">Weight Product</label>
                  <input type="tel" id="weight" name="weight" placeholder="Weight" class="form-control">
                </div>

                <div class="form-group col-md-3">
                  <label for="Hight">Hight Product</label>
                  <input type="tel" id="hight" name="hight" placeholder="Hight" class="form-control">
                </div>

                <div class="form-group col-md-3">
                  <label for="pallet">Total Pallet</label>
                  <input type="tel" id="pallet" name="pallet" placeholder="Pallet Used" class="form-control">
                </div>

                <div class="form-group col-md-3">
                  <label for="cbm">Total CBM</label>
                      <input  type="text" readonly="" id="cbm" name="cbm" placeholder="CBM" class="form-control">
                </div>

                <div class="form-group col-md-3">
                  <label for="tanggal">Tanggal</label>
                      <input  type="text" id="tanggal" name="tanggal" placeholder="Tahun" class="form-control">
                </div>  
                </div>

                <button type="submit" class="btn btn-primary"> Submit Dokumen </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

 
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var produk_id    = $(this).data("produkid");
            var produk_nama  = $(this).data("produknama");
            var produk_harga = $(this).data("produkharga");
            var quantity     = $('#' + produk_id).val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/cart/add_to_cart",
                method : "POST",
                data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
                success: function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
 
        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url();?>index.php/cart/load_cart");
 
        //Hapus Item Cart
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url : "<?php echo base_url();?>cart/hapus_cart",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    $('#detail_cart').html(data);
                }
            });
        });
    });
</script>
