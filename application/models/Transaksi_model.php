<?php

class Transaksi_model extends CI_Model{
    public function getAllFurniture(){
        $query = $this->db->get("tb_transaksi");
        return $query->result_array();
    }
}