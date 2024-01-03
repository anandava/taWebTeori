<?php

class Furniture_model extends CI_Model{
    public function getAllFurniture(){
        $query = $this->db->get("tb_barang");
        return $query->result_array();
    }
    public function tambahDataFurniture(){
        $data = [
            "nama_brg" => $this->input->post("namaBarang", true),
            "harga_brg" => $this->input->post("hargaBarang", true),
            "jumlah_stok" => $this->input->post("jumlahStok", true)
        ];
        $this->db->insert("tb_barang",$data);
    }
    public function hapusDataFurniture($id){
        $this->db->delete("tb_barang",array('id_brg' => $id));
    }

    public function selectData($id){
        if ($id !== null) {
            $this->db->where("id_brg", $id);
            $query = $this->db->get('tb_barang');
    
            if ($query->num_rows() > 0) {
                $result = $query->result();
                return $result;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    public function updateData($id){
        $data = [
            "nama_brg" => $this->input->post("namaBarang", true),
            "harga_brg" => $this->input->post("hargaBarang", true),
            "jumlah_stok" => $this->input->post("jumlahStok", true)
        ];
        $this->db->where('id_brg', $id);
        $this->db->update("tb_barang",$data);
    }
    public function getStockById($barang_id){
        $this->db->select("jumlah_stok");
        $this->db->where("id_brg",$barang_id);
        $query = $this->db->get('tb_barang');
        $result = $query->row_array();
        return $result['jumlah_stok'];
    }
    public function getHargaById($barang_id){
        $this->db->select("harga_brg");
        $this->db->where("id_brg",$barang_id);
        $query = $this->db->get('tb_barang');
        $result = $query->row_array();
        return $result['harga_brg'];
    }
    public function transaksiBarang($barang_id,$jumlah_beli){
        $this->db->where("id_brg",$barang_id);
        $query = $this->db->get("tb_barang");
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $total = $this->getHargaById($barang_id) * $jumlah_beli;
            $data = [
                "nama_barang" => $result["nama_brg"],
                "jumlah_beli" => $jumlah_beli,
                "total" => $total
            ];
            $this->db->insert("tb_transaksi",$data);
            $jumlah_stok = $this->getStockById($barang_id) - $jumlah_beli;
            $updateBarang = [
                "jumlah_stok" => $jumlah_stok
            ];
            $this->db->where('id_brg', $barang_id);
            $this->db->update("tb_barang",$updateBarang);
        }
    }
}