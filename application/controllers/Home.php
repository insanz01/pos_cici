<?php

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Barang_Model');

    $this->load->library('cart');
  }

  public function index()
  {
    // pada bagian ini, kita masuk ke dalam point of sale
    // dapat memasukan kode barang kemudian ditambahkan ke dalam list tabel
    // dapat melakukan transaksi pembayaran, yang nantinya akan masuk ke dalam rekap transaksi
    $data['total_harga'] = "Fitur belum bisa digunakan";
    $data['transaksi'] = $this->cart->contents();

    $this->load->view('templates/header');
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar');
    $this->load->view('home/pos', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_transaksi()
  {
    $id = $this->input->post('kode');
    $barang = $this->Barang_Model->tampilkanDataBarang($id);

    $data = [
      'id' => $barang['kode_barang'],
      'qty' => 1,
      'price' => $barang['harga'],
      'name' => $barang['nama_barang']
    ];
    // var_dump($barang);
    // die;
    $this->cart->insert($data);

    redirect('home');
  }

  public function hapus_transaksi($id)
  {
    $this->cart->remove($id);
    redirect('home');
  }

  public function simpan_transaksi()
  {
    $barang = $this->cart->contents();
    // var_dump($barang);
    // die;

    if ($this->Barang_Model->simpanTransaksi($barang) > 0) {
      $this->session->set_flashdata('sukses', true);
      $this->cart->destroy();
    } else {
      $this->session->set_flashdata('sukses', false);
    }

    redirect('home');
  }

  public function lihat_barang()
  {
    // melihat barang yang tersedia pada stok display ataupun gudang
    // dapat melihat expired (insyaallah)

    $data['barang'] = $this->Barang_Model->tampilkanSemuaBarang();

    $this->load->view('templates/header');
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar');
    $this->load->view('home/barang/lihat', $data);
    $this->load->view('templates/footer');
  }

  public function tambah_barang()
  {
    // menambahkan barang (deskripsi nyusul)
    // terdapat nama barang, satuan barang, harga barang, stok

    $this->form_validation->set_rules('nama', 'Nama', 'required', [
      'required' => 'Nama barang harus diisi'
    ]);

    $this->form_validation->set_rules('satuan', 'Satuan', 'required', [
      'required' => 'Satuan barang harus dipilih'
    ]);

    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric', [
      'required' => 'Harga barang harus ditentukan',
      'numeric' => 'Harga hanya boleh angka.'
    ]);

    $this->form_validation->set_rules('stok', 'Stok', 'numeric', [
      'numeric' => 'Stok hanya boleh dimasukan angka.'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar');
      $this->load->view('home/barang/tambah');
      $this->load->view('templates/footer');
    } else {
      $items = [
        'nama_barang' => htmlspecialchars($this->input->post('nama', 1)),
        'satuan' => htmlspecialchars($this->input->post('satuan', 1)),
        'harga' => htmlspecialchars($this->input->post('harga', 1)),
        'stok' => htmlspecialchars($this->input->post('stok', 1)),
      ];

      if ($this->Barang_Model->tambahBarang($items)) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data barang berhasil disimpan.</div>');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data barang gagal disimpan.</div>');
      }
      redirect('home/tambah_barang');
    }
  }

  public function edit_barang($kode)
  {
    // dapat melakukan perubahan data barang atau penambahan stok

    $this->form_validation->set_rules('nama', 'Nama', 'required', [
      'required' => 'Nama barang harus diisi'
    ]);

    $this->form_validation->set_rules('satuan', 'Satuan', 'required', [
      'required' => 'Satuan barang harus dipilih'
    ]);

    $this->form_validation->set_rules('harga', 'Harga', 'required|numeric', [
      'required' => 'Harga barang harus ditentukan',
      'numeric' => 'Harga hanya boleh angka.'
    ]);

    $this->form_validation->set_rules('stok', 'Stok', 'numeric', [
      'numeric' => 'Stok hanya boleh dimasukan angka.'
    ]);

    if ($this->form_validation->run() == FALSE) {
      $data['barang'] = $this->Barang_Model->tampilkanSatuBarang($kode);

      $this->load->view('templates/header');
      $this->load->view('templates/topbar');
      $this->load->view('templates/sidebar');
      $this->load->view('home/barang/ubah', $data);
      $this->load->view('templates/footer');
    } else {
      $item = [
        'kode_barang' => $this->input->post('kode'),
        'nama_barang' => htmlspecialchars($this->input->post('nama', 1)),
        'satuan' => htmlspecialchars($this->input->post('satuan', 1)),
        'harga' => htmlspecialchars($this->input->post('harga', 1)),
        'stok' => htmlspecialchars($this->input->post('stok', 1)),
      ];

      if ($this->Barang_Model->ubahDataBarang($item) > 0) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data barang berhasil diubah.</div>');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data barang gagal diubah.</div>');
      }

      redirect('home/edit_barang/' . $kode);
    }
  }

  public function hapus_barang($kode)
  {
    // menghapus data barang seutuhnya
    if ($this->Barang_Model->hapusBarang($kode)) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data barang berhasil dihapus.</div>');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data barang gagal dihapus.</div>');
    }
    redirect('home/lihat_barang');
  }

  public function log_transaksi()
  {
    // menyimpan setiap log transaksi yang terjadi pada hari tertentu

    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
      'required' => 'Tanggal harus dipilih ketika ingin melihat filter'
    ]);

    if ($this->form_validation->run() == FALSE) {
      $hari_ini = date('Y-m-d', time());
      $data['barang'] = $this->Barang_Model->logBarang($hari_ini);
      $data['tanggal'] = strtotime($hari_ini);
    } else {
      $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
      $data['barang'] = $this->Barang_Model->logBarang($tanggal);
      $data['tanggal'] = strtotime($tanggal);
    }

    $this->load->view('templates/header');
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar');
    $this->load->view('home/rekap/log_transaksi', $data);
    $this->load->view('templates/footer');
  }

  public function perbaharui_stok($kode)
  {
    // dapat menambah langsung stok barang yang sudah ada
  }

  public function stok_habis()
  {
    // dapat melihat semua stok yang habis
    $this->load->view('templates/header');
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar');
    $this->load->view('home/labels/stok_habis');
    $this->load->view('templates/footer');
  }

  public function stok_hampir_habis()
  {
    // melihat semua limit stok paling tidak kurang atau sama dengan 20 unit per barang
    $this->load->view('templates/header');
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar');
    $this->load->view('home/labels/stok_limit');
    $this->load->view('templates/footer');
  }

  public function best_seller()
  {
    // melihat barang yang paling laku (5 barang paling laris)
    $this->load->view('templates/header');
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar');
    $this->load->view('home/labels/best_seller');
    $this->load->view('templates/footer');
  }
}
