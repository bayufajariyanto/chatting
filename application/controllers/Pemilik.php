<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Pemilik';
        $data['barang'] = $this->db->get('barang')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('pemilik/index');
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->db->delete('barang', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data berhasil dihapus</div>');
        redirect('pemilik');
    }

    public function ubah()
    {
        $data = [
            'title' => 'Pemilik',
            'barang' => $this->db->get_where('barang', ['id' => $this->uri->segment(3)])->row_array()
        ];
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');

        $nama = $this->input->post('nama');
        $stok = $this->input->post('stok');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('pemilik/ubah');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $nama,
                'stok' => $stok
            ];
            $this->db->update('barang', $data, $this->uri->segment(3));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            redirect('pemilik');
        }
    }
}
