<?php

class Transaksi extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library("form_validation");
    }
    public function index(){
        $data["judul"] = "Halaman Transaksi";
        $this->form_validation->set_rules("jumlahBeli","Jumlah Beli","required|numeric");
        $this->load->model("Furniture_model");
        $data["barang"] = $this->Furniture_model->getAllFurniture();
        if ($this->form_validation->run() == FALSE){
            $this->load->view("templates/header",$data);
            $this->load->view("transaksi/index",$data);
            $this->load->view("templates/footer");
        }
        else{
            // $this->load->model("Furniture_model");
            $barang_id = $this->input->post('idBarang');
            $stok_tersedia = $this->Furniture_model->getStockById($barang_id);
            $jumlah_beli = $this->input->post('jumlahBeli');
            if ($jumlah_beli > $stok_tersedia) {
                $data['error'] = 'Stok barang tidak mencukupi.';
                $this->load->view("templates/header", $data);
                $this->load->view("transaksi/index", $data);
                $this->load->view("templates/footer");
            }
            else{
                $this->Furniture_model->transaksiBarang($barang_id,$jumlah_beli);
                $this->session->set_flashdata("flash","Berhasil");
                redirect("transaksi");
            }
        }
    }
}