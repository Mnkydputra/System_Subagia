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
            
              <form  id="addDO"  enctype="multipart/form-data" class="form-horizontal"  method="post">
                <div class="form-group">
                  <input type="hidden" name="id" id="id" value="<?= $delivery->id?>">
                </div>
                <div class="form-group">
                    <input type="text" readonly="" id="po_number" name="po_number" placeholder="PO Number" class="form-control" value="<?= $delivery->po_number?>">
                </div>
                <div class="form-group">
                    <input type="text" readonly="" id="shipref" name="shipref" placeholder="Shipping Referensi" class="form-control" value="<?= $delivery->shipref?>">
                </div>
                <div class="form-group">
                    <input type="text" readonly="" id="product_number" name="product_number" placeholder="Product Number" class="form-control" value="<?= $delivery->product_number?>">
                </div>
               <div class="form-group">
                    <input type="text" readonly="" id="product_desc" name="product_desc" placeholder="Product Nama" class="form-control" value="<?= $delivery->product_desc?>">
                </div>
                <div class="form-group">
                  <input readonly="" type="tel" id="quantity" name="quantity" placeholder="Jumlah Barang" class="form-control" value="<?= $delivery->quantity?>">
                </div>
              
                <div class="form-group">
                <textarea readonly="" class="form-control" id="desc" name="desc" rows="3" placeholder="Deskripsi Produk" > <?= $delivery->spesial_instruct?> </textarea>
                </div>
                <div class="form-group">
                  <input type="text" id="driver" name="driver" placeholder="Driver" class="form-control" value="<?= $akun->nama?>">
                </div>
                 <div class="form-group">
                   <select class="form-control" id="status" name="status">
                    <option>On Proses</option>
                    <option>Done</option>
                    </select>
                </div>
                <div class="form-group">
                      <input  type="text" id="tanggal" name="tanggal" placeholder="Tahun" class="form-control">
                </div>
                <button type="submit" class="btn btn-info"> Submit Dokumen </button>
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
        var postData = new FormData(this);
        e.preventDefault();
        if(document.getElementById('driver').value == ""){
          alert("Nama Product Masih Kosong")
        }else if(document.getElementById('status').value=""){
          alert("Product Number Masih Kosong")
        }else if(document.getElementById('tanggal').value == ""){
          alert("Quantity Tidak Boleh Kosong")
        }else {
          $.ajax({
            url : "<?= base_url('i/P_requirment/addDriver') ?>",
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
                alert("Data Anda Telah Kami Terima");
                window.location.href='<?= base_url('i/P_requirment/p_rq')?>'
              }else{
                alert("Data Anda Tidak Berhasil Kami Terima, Silahkan Ulangi Kembali")
              }
            }
          })
        }
      })
      
    })

</script>