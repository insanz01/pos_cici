<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Aplikasi Toko Mamah Cici
        <small>Point of Sale</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="padding: 1em 0"><strong>Day</strong> : <?= date('D, d M Y', $tanggal); ?></h3>
            </div>
            <div class="row">
              <form style="padding-left: 1em;" action="<?= base_url('home/log_transaksi') ?>" method="post">
                <div class="col-lg-6">
                  <input type="date" name="tanggal" id="tanggal" oninput="true">
                </div>
                <div class="col-lg-6">
                  <button class="btn btn-primary" type="submit" style=" float: right; margin-right: 10px;">Cari menggunakan filter</button>
                </div>
            </div>
            </form>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="pos" class="table table-hover">
                <thead>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!$barang) : ?>
                    <tr>
                      <td colspan="6" class="text-center">Tidak ada catatan data transaksi.</td>
                    </tr>
                  <?php else : ?>
                    <?php foreach ($barang as $b) : ?>
                      <tr>
                        <td><?= $b['id']; ?></td>
                        <td><?= $b['name']; ?></td>
                        <td><?= $b['qty']; ?></td>
                        <td><?= $b['price']; ?></td>
                        <td><?= $b['subtotal']; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
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