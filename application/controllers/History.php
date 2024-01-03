<?php

class History extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library("form_validation");
    }
    public function index(){
        $data["judul"] = "Halaman Transaksi";
        $this->load->model("Transaksi_model");
        $data["transaksi"] = $this->Transaksi_model->getAllFurniture();
        $this->load->view("templates/header",$data);
        $this->load->view("history/index",$data);
        $this->load->view("templates/footer");
    }
}