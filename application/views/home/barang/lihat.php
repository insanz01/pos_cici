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
        <div class="col-lg-11 mx-auto">
          <div class="text-center">
            <?= $this->session->flashdata('pesan'); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-11 mx-auto">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="padding: 1em 0"><strong>Today</strong> : <?= date('D, d M Y', time()); ?></h3>
              <a href="<?= base_url('home/tambah_barang'); ?>" style="margin: 5px 10px" class="btn btn-primary pull-right">Tambah Barang</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatabel" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($barang as $b) : ?>
                    <tr>
                      <td><?= $b['kode_barang']; ?></td>
                      <td><?= $b['nama_barang']; ?></td>
                      <td><?= $b['satuan']; ?></td>
                      <td><?= $b['harga']; ?></td>
                      <td><?= $b['stok']; ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('home/edit_barang/') . $b['kode_barang']; ?>" class="badge bg-blue">ubah</a>
                        <a href="<?= base_url('home/hapus_barang/') . $b['kode_barang']; ?>" class="badge bg-red">hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
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