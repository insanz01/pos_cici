<?php

class Barang_Model extends CI_Model
{
  public function tampilkanSemuaBarang()
  {
    return $this->db->get('barang')->result_array();
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
}
