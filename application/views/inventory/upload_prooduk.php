<div id="responsive" class="container-fluid ">
    <div class="row">
    <h3>Upload Data Produk</h3>
    <div class="container-fluid">
    <?php if($this->session->flashdata("success"))  { ?>
      <div class="alert alert-info">
        <?= $this->session->flashdata("success") ?>
      </div>
    <?php }else if($this->session->flashdata("error"))  { ?>
      <div class="alert alert-danger">
        <?= $this->session->flashdata("error") ?>
      </div>
    <?php } ?>
    <div>
      <form method="post"  enctype="multipart/form-data" action="<?= base_url('i/Upload_produk/upload') ?>" id="uploadpegawai">
          <input type="file" onchange="return cekexe()" name="upload_file" id="upload_file" class="form-control">
        <a href="#" class="btn btn-success btn-round">download format upload</a>

        <button type="submit" name="submit" class="btn btn-danger btn-round">Posting</button>
      </form>
      </div>
      
    </div>
    </div>
</div>