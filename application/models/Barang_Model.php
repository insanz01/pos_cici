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

  public function hapusBarang($kode) {
    return $this->db->delete('barang', ['kode_barang' => $kode]);
  }
}
