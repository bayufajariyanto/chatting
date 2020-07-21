<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{
    public function index(){
        $data['title'] = 'Pemilik';
        $data['barang'] = $this->db->get('barang')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pemilik/index');
        $this->load->view('templates/footer');
    }
}