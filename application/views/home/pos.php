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
              <h3 class="box-title" style="padding: 1em 0"><strong>Today</strong> : <?= date('D, d M Y', time()); ?></h3>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <form style="padding-left: 1em;" name="transaksi" action="<?= base_url('home/tambah_transaksi') ?>" method="post">
                  <input type="text" name="kode" id="kode" placeholder="Masukan kode barang">
                </form>
              </div>
              <script>
                document.onkeypress = function keypressed(e) {
                  var keyCode = (window.event) ? e.which : e.keyCode;
                  if (keyCode == 13) {
                    if (ValidateContactForm())
                      document.transaksi.submit();
                  }
                }
              </script>
              <div class="col-lg-6">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default" style=" float: right; margin-right: 10px;">Pembayaran</button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="pos" class="table table-hover">
                <thead>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($transaksi as $t) : ?>
                    <tr>
                      <td><?= $t['id'] ?></td>
                      <td><?= $t['name'] ?></td>
                      <td><?= $t['qty'] ?></td>
                      <td><?= $t['price'] ?></td>
                      <td><?= $t['subtotal'] ?></td>
                      <td>
                        <a href="<?= base_url('home/hapus_transaksi/') . $t['rowid'] ?>" class="badge bg-red">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Total Pembayaran</h4>
      </div>
      <form action="<?= base_url('home/simpan_transaksi'); ?>" method="post">
        <div class="modal-body">
          <p>Total Harga yang harus dibayar : <b id="nominal"><?= $this->cart->total(); ?></b></p>
          <p>Nominal yang dibayar :
            <input type="number" class="form-control" name="bayar" autofocus placeholder="Masukan Nominal uang yang dibayar" id="bayar" onchange="insertCash()">
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" id="tombol" class="btn btn-primary" disabled>Bayar sekarang</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  let insertCash = function() {
    let bayar = document.getElementById('bayar');
    let nominal = document.getElementById('nominal');
    let tombol = document.getElementById('tombol');

    if (parseInt(bayar.value) >= parseInt(nominal.innerText)) {
      tombol.removeAttribute('disabled');
    } else {
      tombol.setAttribute('disabled', true);
    }
  }
</script>