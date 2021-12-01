  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div  class="modal-content">
                    <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                    </div>
                      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('Logout') ?>">Logout</a>
                      </div>
                      </div>
            </div>  
      </div>
    </div>

      <div class="modal fade" id="Ceklogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div  class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">CEK LOGIN</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                        </div>
                          <div class="modal-body">
                           <span> Two Factor Authenticasi </span>
                              <form method="post" onsubmit="return validasi()" action="<?= base_url('Home/Ceklogin') ?>">
                                  <div class="form-group">
                                    <!-- <label>NPK</label> -->
                                    <input type="email" name="email" id="email" autocomplete="off" placeholder="Alamat Email" data-validate="NPK is Required"  value="<?= $akun->email ?>">
                                  </div>
                                  <div class="form-group">
                                    <!-- <label>PASSWORD</label> -->
                                    <input type="password" name="password" id="password" placeholder="Masukan Password anda" data-validate="Password is Reuired">
                                  </div>
                                  <div class="form-group">  
                                    <button class="btn btn-primary" type="submit">LOGIN</button>
                                  </div>
                                </form>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            
                          </div>
                          </div>
                </div>  
          </div>
        </div>



  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
      </ul>
    </div>
  </div>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
 
 <script>
    $(document).ready(function() {
      $('#table_id').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }

      });

      var table = $('#table_id').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
    });
  </script>
<script>
  $( function() {
    $( "#tanggal" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth:  true,
      changeYear:   true
    });
  });
  </script>
</body>

</html>