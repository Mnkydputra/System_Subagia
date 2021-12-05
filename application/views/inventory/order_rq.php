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
                            <form id="generate_order" action="<?= base_url("i/Order/orderpo") ?>" enctype="multipart/form-data" class="form-horizontal" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="po_number">Pre Order Number</label>
                                        <input type="text" readonly id="po_number" name="po_number" placeholder="Pre Order Number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pallet">Destionation</label>
                                    <input type="text" id="shipment" name="shipment" placeholder="Destination" class="form-control">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="cbm">Truck Type</label>
                                    <input type="text" id="truck" name="truck" placeholder="Truck Type" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Spesial Instruct Product</label>
                                    <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Deskripsi Produk"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" id="tanggal" name="tanggal" placeholder="Tahun" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="Check">
                                        <label class="form-check-label" for="Check">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info"> Create Order Delivery </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<script type="text/javascript">
    function makeid(length) {
        var result = '';
        var characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() *
                charactersLength));
        }
        return result;
    }

    $(function() {

        $("#po_number").val(makeid(12));

        $("#addDO").on('submit', function(e) {
            var postData = new FormData(this);
            e.preventDefault();
            if (document.getElementById('shipref').value == "") {
                alert("Nama Product Masih Kosong")
            } else if (document.getElementById('product_number').value = "") {
                alert("Product Number Masih Kosong")
            } else if (document.getElementById('quantity').value == "") {
                alert("Quantity Tidak Boleh Kosong")
            } else if (document.getElementById('po_number').value == "") {
                alert("Silahkan Tulis Delivery Number")
            } else if (document.getElementById('tanggal').value == "") {
                alert("Tanggal Masih Kosong")
            } else {
                $.ajax({
                    url: "<?= base_url('i/P_requirment/shipDO') ?>",
                    method: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $("#submit").attr("disabled", true);
                    },
                    complete: function() {
                        $("#submit").attr("disabled", false);
                    },
                    success: function(e) {
                        if (e = "sukses") {
                            alert("Data DO Anda Telah Kami Terima");
                            window.location.href = '<?= base_url('i/P_requirment/p_rq') ?>'
                        } else {
                            alert("Data Anda Tidak Berhasil Kami Terima, Silahkan Ulangi Kembali")
                        }
                    }
                })
            }
        })

    })

    $('.click').on('click', function(e) {
        document.getElementById("id").value = $(this).attr("data-id");
        document.getElementById("awb").value = $(this).attr("data-awb");
        document.getElementById("shipref").value = $(this).attr("data-shipref");
        document.getElementById("product_number").value = $(this).attr("data-product_number");
        document.getElementById("product_desc").value = $(this).attr("data-product_desc");
        document.getElementById("quantity").value = $(this).attr("data-quantity");
        document.getElementById("pallet").value = $(this).attr("data-pallet");
        document.getElementById("cbm").value = $(this).attr("data-cbm");
        $('#selectBarang').modal('hide');
    })
</script>