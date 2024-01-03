<?php

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library("form_validation");
    }
    public function index(){
        $data["judul"] = "Halaman Home";
        $this->load->model("Furniture_model");
        $data["barang"] = $this->Furniture_model->getAllFurniture();
        $this->load->view("templates/header",$data);
        $this->load->view("home/index",$data);
        $this->load->view("templates/footer");
    }
    public function tambah(){
        $data["judul"] = "Tambah Data Furniture";
        $this->form_validation->set_rules("namaBarang","Nama Barang","required");
        $this->form_validation->set_rules("hargaBarang","Harga Barang","required|numeric");
        $this->form_validation->set_rules("jumlahStok","Jumlah Stok","required|numeric");
        if ($this->form_validation->run() == FALSE){
            $this->load->view("templates/header",$data);
            $this->load->view("home/tambah",$data);
            $this->load->view("templates/footer");
        }
        else{
            $this->load->model("Furniture_model");
            $this->Furniture_model->tambahDataFurniture();
            $this->session->set_flashdata("flash","ditambahkan");
            redirect("home");
        }
    }
    public function edit($id){
        $this->load->model("Furniture_model");
        // redirect("home");
        $data["judul"] = "Tambah Data Furniture";
        $data['select'] = $this->Furniture_model->selectData($id);
        $this->form_validation->set_rules("namaBarang","Nama Barang","required");
        $this->form_validation->set_rules("hargaBarang","Harga Barang","required|numeric");
        $this->form_validation->set_rules("jumlahStok","Jumlah Stok","required|numeric");
        if ($this->form_validation->run() == FALSE){
            $this->load->view("templates/header",$data);
            $this->load->view("home/edit",$data);
            $this->load->view("templates/footer");
        }
        else{
            $this->Furniture_model->updateData($id);
            $this->session->set_flashdata("flash","diperbarui");
            redirect("home");
        }
    }

    public function hapus($id){
        $this->load->model("Furniture_model");
        $this->Furniture_model->hapusDataFurniture($id);
        $this->session->set_flashdata("flash","dihapus");
        redirect("home");
    }
}