<div id="responsive" class="container-fluid ">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Shipment Prosses</h5>
                    <h2 class="card-title">On Shipping</h2>
                  </div>
                  <div class="col-sm-6">
                        <a type="button" class="btn btn-sm btn-primary btn-simple active float-right" href="<?php echo base_url("i/P_requirment/")?>p_rq">
                          Buat Delivery Order
                        </a>
                  </div>
                  <div class="card-body">
                    <table id="table_id" class="table striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>AWB</th>
                            <th>Shipref</th>
                            <th>Product Number</th>
                            <th>Quantity</th>
                            <th>Total Pallet</th>
                            <th>Total CBM</th>
                            <th>action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1;
                          foreach ($delivery_order as $gg) : ?>
                          <tr>
                            <td><?= $no++?></td>
                            <td><?= $gg->awb?></td>
                            <td><?= $gg->shipref?></td>
                            <td><?= $gg->product_number?></td>
                            <td><?= $gg->quantity?></td>
                            <td><?= $gg->pallet?></td>
                            <td><?= $gg->total_cbm?></td>
                            <td><a href="<?= base_url('i/P_requirment/CetakDO/' . $gg->awb) ?>" target="_blank" class="btn btn-info btn-fab btn-fab-mini btn-round">
                            <i class="tim-icons icon-delivery-fast">Cetak Order</i>
                          </a></td>
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
  </script>