<?php

class Barang_Model extends CI_Model
{
  public function tampilkanSemuaBarang()
  {
    return $this->db->get('barang')->result_array();
  }

  public function tampilkanDataBarang($kode)
  {
    $this->db->select('kode_barang, nama_barang, satuan, harga');
    $this->db->from('barang');
    $this->db->where('kode_barang', $kode);
    return $this->db->get()->row_array();
  }

  public function tambahBarang($items)
  {
    return $this->db->insert('barang', $items);
  }

  public function hapusBarang($kode)
  {
    return $this->db->delete('barang', ['kode_barang' => $kode]);
  }

  public function tampilkanSatuBarang($kode)
  {
    return $this->db->get_where('barang', ['kode_barang' => $kode])->row_array();
  }

  public function simpanTransaksi($data)
  {
    foreach ($data as $dt) {
      $this->db->select('stok');
      $this->db->from('barang');
      $this->db->where('kode_barang', $dt['id']);
      $stok = $this->db->get()->row_array();

      $stok['stok'] = (int)$stok['stok'] - (int)$dt['qty'];

      $this->db->set('stok', $stok['stok']);
      $this->db->where('kode_barang', $dt['id']);
      $this->db->update('barang');

      $this->db->insert('transaksi', $dt);
    }
    return $this->db->affected_rows();
  }

  public function ubahDataBarang($item)
  {
    $this->db->set('nama_barang', $item['nama_barang']);
    $this->db->set('satuan', $item['satuan']);
    $this->db->set('harga', $item['harga']);
    $this->db->set('stok', $item['stok']);
    $this->db->where('kode_barang', $item['kode_barang']);
    $this->db->update('barang');
    return $this->db->affected_rows();
  }

  public function ubahStokBarang($kode, $jumlah)
  {
    $this->db->set('stok', $jumlah);
    $this->db->where('kode_barang', $kode);
    $this->db->update('barang');
    return $this->db->affected_rows();
  }

  public function logBarang($tanggal)
  {
    return $this->db->get_where('transaksi', ['date(tanggal)' => $tanggal])->result_array();
  }
}
