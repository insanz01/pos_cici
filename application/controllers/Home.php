<?php

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Barang_Model');
  }

  public function index()
  {
    // pada bagian ini, kita masuk ke dalam point of sale
    // dapat memasukan kode barang kemudian ditambahkan ke dalam list tabel
    // dapat melakukan transaksi pembayaran, yang nantinya akan masuk ke dalam rekap transaksi
    $data['total_harga'] = "Fitur belum bisa digunakan";

    $this->load->view('templates/header');
    $this->load->view('templates/topbar');
    $this->load->view('templates/sidebar');
    $this->load->view('home/pos', $data);
    $this->load->view('templates/footer');
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

  public function edit_barang()
  {
    // dapat melakukan perubahan data barang atau penambahan stok
    $this->load->view('home/barang/edit');
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
    $this->load->view('home/rekap/log_transaksi');
  }
}
