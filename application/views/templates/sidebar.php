<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url() ?>assets/img/cici.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Point of Sale Cici</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">APLIKASI UTAMA</li>
      <li>
        <a href="<?= base_url('home'); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url('home/log_transaksi'); ?>">
          <i class="fa fa-calendar"></i> <span>Log Transaksi</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url('home/lihat_barang') ?>">
          <i class="fa fa-table"></i> <span>Persediaan Barang</span>
        </a>
      </li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Stok Habis</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Stok Hampir Habis</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Best Seller</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>