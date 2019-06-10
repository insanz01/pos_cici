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
                <form style="padding-left: 1em;" action="<?= base_url('home/index') ?>" method="post">
                  <input type="text" name="kode" id="kode" placeholder="Masukan kode barang" oninput="true">
                </form>
              </div>
              <div class="col-lg-6">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default" style=" float: right; margin-right: 10px;">Pembayaran</button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="number" style="width: 50px" min="1"></td>
                    <td></td>
                    <td></td>
                  </tr>
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
      <form action="#" method="post">
        <div class="modal-body">
          <p>Total Harga yang harus dibayar : <b><?= $total_harga; ?></b></p>
          <p>Nominal yang dibayar :
            <input type="number" class="form-control" name="bayar" autofocus placeholder="Masukan Nominal uang yang dibayar">
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>