<div id="responsive" class="container-fluid ">
  <div class="row">
    <div class="col-12">
      <div class="card card-chart">
        <div class="card-header">
          <div class="row">
            <div class="col-sm-6 text-left">
              <h5 class="card-category">Data Requirment</h5>
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
                    <th>Product Name</th>
                    <th>Product Number</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; 
                  foreach ($stock as $f) :?>
                  <tr>
                    <td><?= $no++?></td>
                    <td><a class="btn btn-raised btn-round btn-primary click" 
                        data-id="<?= $f->id?>"
                        data-sp="<?= $f->shipref?>"
                        data-pn="<?= $f->product_number?>"
                        data-pm="<?= $f->product_desc?>"
                        data-qt="<?= $f->quantity?>"
                        data-partner="<?= $f->sales_partner?>">
                        
                        
                        
                        <?= $f->product_desc ?> 
                      </a>
                    </td>
                  <td><?= $f->product_number?></td>
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
    $(document).ready(function() {
        $("#long, #weight, #hight, #pallet").keyup(function() {
            var long  = $("#long").val();
            var weight = $("#weight").val();
            var hight   = $("#hight").val();
            var pallet = $("#pallet").val();
            var bagi    = 1000000;
            var cbm = parseInt(long) * parseInt(weight) * parseInt(hight) / parseInt(bagi);
            var TotalCBM = Math.floor((Math.pow(10, 2)*cbm)+0.5)*Math.pow(10, -2); 
            $("#cbm").val(parseFloat(TotalCBM) * parseInt(pallet));
        });
    });
</script>

<script type="text/javascript">
    function cekexe(){
      const file = document.getElementById('file');
      const path = file.value;
      const exe = /(\.pdf)$/i;
      if(!exe.exec(path)){
        alert("file harus berbentuk pdf");
        file.value="";
        return ;
      }
    }

    $(function(){
      $("#addDO").on('submit', function(e){
        var postData = new FormData(this);
        e.preventDefault();
        if(document.getElementById('product_desc').value == ""){
          alert("Nama Product Masih Kosong")
        }else if(document.getElementById('product_number').value=""){
          alert("Product Number Masih Kosong")
        }else if(document.getElementById('quantity').value == ""){
          alert("Quantity Tidak Boleh Kosong")
        }else if(document.getElementById('long').value == ""){
          alert("Ukuran Barang Harap Di Isi")
        }else if(document.getElementById('weight').value == ""){
          alert("Ukuran Barang Harap Di Isi")
        }else if(document.getElementById('hight').value == ""){
          alert("Ukuran Barang Harap Di Isi")
        }else if(document.getElementById('pallet').value == ""){
          alert("Jumlah Pallet Tidak Boleh Kosong")
        }else if(document.getElementById('tanggal').value == ""){
          alert("Harap Masukan Tanggal")
        }else {
          $.ajax({
            url : "<?= base_url('i/Data_rq/addDO') ?>",
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
                window.location.href='<?= base_url('i/Data_rq/')?>'
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
      document.getElementById("shipref").value            = $(this).attr("data-sp");
      document.getElementById("sales_partner").value      = $(this).attr("data-partner");
      document.getElementById("product_desc").value       = $(this).attr("data-pm");
      document.getElementById("product_number").value     = $(this).attr("data-pn");
      document.getElementById("quantitybefore").value     = $(this).attr("data-qt");
      $('#selectBarang').modal('hide');
    })
</script>

