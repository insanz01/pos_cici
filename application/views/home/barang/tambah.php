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
              <h3 class="box-title">Tambah Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url('home/tambah_barang') ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama Barang</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama barang" value="<?= set_value('nama'); ?>">
                  <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label for="satuan">Satuan Barang</label>
                  <select name="satuan" id="satuan" class="form-control">
                    <option value="Pc">Pc(s)</option>
                    <option value="Doz">Doz</option>
                    <option value="Saset">Saset</option>
                    <option value="Box">Box</option>
                    <option value="Renteng">Renteng</option>
                    <option value="Kg">Kg</option>
                  </select>
                  <?= form_error('satuan', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan harga barang per-unit nya" value="<?= set_value('harga'); ?>">
                  <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                  <label for="stok">Stok awal</label>
                  <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukan stok awal barang (jika ada)"  value="<?= set_value('stok'); ?>">
                  <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan Barang</button>
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