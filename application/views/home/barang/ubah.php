<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Aplikasi Toko Mamah Cici
        <small>Persediaan Barang</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <?= $this->session->flashdata('pesan'); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url('home/edit_barang/' . $barang['kode_barang']) ?>" method="post">
              <input type="hidden" value="<?= $barang['kode_barang'] ?>" name="kode">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama Barang</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama barang" value="<?= $barang['nama_barang']; ?>">
                  <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label for="satuan">Satuan Barang</label>
                  <select name="satuan" id="satuan" class="form-control">
                    <option value="Pc" <?php echo ($barang['satuan'] == "Pc") ? "selected" : ""; ?>>Pc(s)</option>
                    <option value="Doz" <?php echo ($barang['satuan'] == "Doz") ? "selected" : ""; ?>>Doz</option>
                    <option value="Saset" <?php echo ($barang['satuan'] == "Saset") ? "selected" : ""; ?>>Saset</option>
                    <option value="Box" <?php echo ($barang['satuan'] == "Box") ? "selected" : ""; ?>>Box</option>
                    <option value="Renteng" <?php echo ($barang['satuan'] == "Renteng") ? "selected" : ""; ?>>Renteng</option>
                    <option value="Kg" <?php echo ($barang['satuan'] == "Kg") ? "selected" : ""; ?>>Kg</option>
                  </select>
                  <?= form_error('satuan', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan harga barang per-unit nya" value="<?= $barang['harga']; ?>">
                  <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label for="stok">Stok</label>
                  <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukan stok barang (jika ada)" value="<?= $barang['stok'] ?>">
                  <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit Barang</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <script>
        document.write(new Date().getFullYear())
      </script> <a href="http://www.primbon.com">Fitriana Puspa</a>.</strong>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->