<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
	public function index()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Kasir';
			$data['barang'] = $this->db->get('barang')->result_array();
			$this->load->view('templates/header', $data);
			$this->load->view('kasir/index');
			$this->load->view('templates/footer');
		} else {
			$this->tambah();
		}
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$stok = $this->input->post('stok');
		$data = [
			'nama' => $nama,
			'stok' => $stok
		];
		$this->db->insert('barang', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>');
		redirect('kasir');
	}

	public function hapus($id)
	{
		$this->db->delete('barang', ['id' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data berhasil dihapus</div>');
		redirect('kasir');
	}
	
	public function ubah()
	{
		$data = [
			'title' => 'Kasir',
			'barang' => $this->db->get_where('barang', ['id' => $this->uri->segment(3)])->row_array()
		];
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim');

		$nama = $this->input->post('nama');
		$stok = $this->input->post('stok');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('kasir/ubah');
			$this->load->view('templates/footer');
		} else {
			// var_dump($nama);die;
			$data = [
				'nama' => $nama,
				'stok' => $stok
			];
            $this->db->update('barang', $data, $this->uri->segment(3));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
			redirect('kasir');
		}
	}
	
	public function chat(){
		$data['title'] = 'Kasir';
		$this->load->view('templates/header', $data);
		$this->load->view('chat/index');
		$this->load->view('templates/footer');
	}
}
