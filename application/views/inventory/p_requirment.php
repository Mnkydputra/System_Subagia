<div id="responsive" class="container-fluid ">
  <div class="row">
    <div class="col-12">
      <div class="card card-chart">
        <div class="card-header">
          <div class="row">
            <div class="col-sm-6 text-left">
              <h5 class="card-category">Delivery Order</h5>
            </div>
            <div class="col-12">
                <div class="form-group">
                  <button type="button" data-toggle="modal" data-target="#selectBarang" class="btn btn-primary">Cari Barang <i class="tim-icons icon-zoom-split"></i></button>
                </div>

              <form  id="addDO"  enctype="multipart/form-data" class="form-horizontal"  method="post">
                <div class="form-group">
                  <input type="hidden" name="id" id="id">
                </div>

                <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="po_number">Pre Order Number</label>
                  <input type="text" id="po_number" name="po_number" placeholder="Pre Order Number" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="awb">Air Ways Bills</label>
                    <input type="text" readonly="" id="awb" name="awb" placeholder="Nomor Air Way Bills" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="shipref">Shipping Referensi</label>
                    <input type="text" readonly="" id="shipref" name="shipref" placeholder="Shipping Referensi" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="product_number">Product Number</label>
                    <input type="text" readonly="" id="product_number" name="product_number" placeholder="Product Number" class="form-control">
                </div>
               <div class="form-group col-md-6">
                 <label for="product_desc">Product Description</label>
                    <input type="text" readonly="" id="product_desc" name="product_desc" placeholder="Product Description" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="quantity">Total Quantity</label>
                  <input readonly="" type="tel" id="quantity" name="quantity" placeholder="Jumlah Barang" class="form-control">
                </div>
                
                <div class="form-group col-md-6">
                  <label for="pallet">Total Pallet</label>
                  <input readonly="" type="tel" id="pallet" name="pallet" placeholder="Jumlah Pallet" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="cbm">Total CBM</label>
                  <input readonly="" type="tel" id="cbm" name="cbm" placeholder="Total CBM" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="pallet">Destionation</label>
                  <input  type="text" id="shipment" name="shipment" placeholder="Destination" class="form-control">
                </div>

                <div class="form-group col-md-6">
                  <label for="cbm">Truck Type</label>
                  <input  type="text" id="truck" name="truck" placeholder="Truck Type" class="form-control">
                </div>
                </div>
              
                <div class="form-group">
                  <label for="desc">Spesial Instruct Product</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Deskripsi Produk" > </textarea>
                </div>
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                      <input  type="text" id="tanggal" name="tanggal" placeholder="Tahun" class="form-control">
                </div>
                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="Check">
                      <label class="form-check-label" for="Check">
                        Check me out
                      </label>
                    </div>
                  </div>
                <button type="submit" class="btn btn-info"> Submit Dokumen </button>
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
                    <th>Number Air Way Bills</th>
                    <th>ShipRef</th>
                    <th>Product Number</th>
                    <th>Quantity</th>
                    <th>Total CBM</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php $no=1; 
                  ?>
                  <tr>
                    <td><?= $no++?></td>
                    <td><a class="btn btn-raised btn-round btn-primary click" 
                        data-id="<?= $stock->id?>"
                        data-awb="<?= $stock->awb?>"
                        data-shipref="<?=$stock->shipref?>",
                        data-product_number="<?= $stock->product_number?>"
                        data-product_desc="<?= $stock->product_desc?>"
                        data-quantity="<?= $stock->quantity?>"
                        data-pallet="<?= $stock->pallet?>"
                        data-cbm="<?= $stock->cbm?>">
                        <?= $stock->awb?> 
                      </a>
                    </td>
                  <td><?= $stock->shipref?></td>
                  <td><?= $stock->product_number?></td>
                  <td><?= $stock->quantity?></td>
                  <td><?= $stock->cbm?></td>
                </tr>
               
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
        var postData = new FormData(this);
        e.preventDefault();
        if(document.getElementById('shipref').value == ""){
          alert("Nama Product Masih Kosong")
        }else if(document.getElementById('product_number').value=""){
          alert("Product Number Masih Kosong")
        }else if(document.getElementById('quantity').value == ""){
          alert("Quantity Tidak Boleh Kosong")
        }else if(document.getElementById('po_number').value == ""){
          alert("Silahkan Tulis Delivery Number")
        }else if(document.getElementById('tanggal').value == ""){
          alert("Tanggal Masih Kosong")
        }else {
          $.ajax({
            url : "<?= base_url('i/P_requirment/shipDO') ?>",
            method : "POST" ,
            data : postData ,
            processData : false ,
            contentType : false ,
            cache : false ,
            beforeSend : function(){
              $("#submit").attr("disabled",true);
            },
            complete : function(){
              $("#submit").attr("disabled",false);
            },
            success : function(e){
              if(e = "sukses"){
                alert("Data DO Anda Telah Kami Terima");
                window.location.href='<?= base_url('i/P_requirment/p_rq')?>'
              }else{
                alert("Data Anda Tidak Berhasil Kami Terima, Silahkan Ulangi Kembali")
              }
            }
          })
        }
      })
      
    })

    $('.click').on('click',function(e){
      document.getElementById("id").value                 = $(this).attr("data-id");
      document.getElementById("awb").value                = $(this).attr("data-awb");
      document.getElementById("shipref").value            = $(this).attr("data-shipref");
      document.getElementById("product_number").value     = $(this).attr("data-product_number");
      document.getElementById("product_desc").value       = $(this).attr("data-product_desc");
      document.getElementById("quantity").value           = $(this).attr("data-quantity");
      document.getElementById("pallet").value             = $(this).attr("data-pallet");
      document.getElementById("cbm").value                = $(this).attr("data-cbm");
      $('#selectBarang').modal('hide');
    })
</script>