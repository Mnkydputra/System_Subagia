<div id="responsive" class="container-fluid ">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Stock barang</h5>
                    <h2 class="card-title">Barang Ready</h2>
                  </div>
                  <div class="col-sm-6">
                        <a type="button" class="btn btn-sm btn-primary btn-simple active float-right" href="<?php echo base_url("i/")?>Upload_produk">
                          Update Data Inventory
                        </a>
                  </div>
                  <div class="card-body">
                    <table id="table_id" class="table small">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Id Product</th>
                            <th>Product Number</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Long</th>
                            <th>Weight</th>
                            <th>Height</th>
                            <th>Pallet</th>
                            <th>Cbm</th>
                            <th>Total CBM</th>
                            <th>Tanggal</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        
    




<script type="text/javascript">
    
    $('.click').on('click',function(e){
        document.getElementById("product_number").value = $(this).attr('data-product');
        document.getElementById("product_name").value = $(this).attr('data-nama');
        document.getElementById("pkwt_lama").value = $(this).attr('data-nopkwt');
        document.getElementById("id").value = $(this).attr('data-id');
        document.getElementById("id_user").value = $(this).attr('data-id_user');
        $('#selectProduct').modal('hide');
    })

    $(document).ready(function() {
    //tampilkan data dari controler ke tablel
    $.ajax({
    type : 'GET', 
	  url : "<?php echo base_url("i/Stock/getData") ?>",
    contentType:"application/json; charset=utf-8",
	  dataType : 'json',
        async : false ,
        success : function(response){
          
         var j = 1 ;
         var data = [];
                for ( var i=0 ; i < response.length ; i++ ) {
                  data.push( [j ,response[i].id_product, 
                                 response[i].product_name, 
                                 response[i].description, 
                                 response[i].quantity,
                                 response[i].l,
                                 response[i].w,
                                 response[i].h,
                                 response[i].pallet,
                                 response[i].cbm,
                                 response[i].total_cbm,
                                 response[i].tanggal,

                    ]);

                    j++ ;
                }

            $('#table_id').DataTable( {
                data:           data,
                pageLength :    10 ,
                deferRender:    true,
                scrollCollapse: true,
                scroller:       true,
                paging: false,
                searching: false,
                 dom: 'Bfrtip',
                   buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
                ],
            } );
        }
    })
  });
  </script>