<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pegawai');
	}

	public function index()
	{
		$data = array(
			'judulcontent' => 'Pegawai',
			'pegawai' => $this->m_pegawai->get_data(),
		);
        $this->load->view('_partial/header');
        $this->load->view('_partial/sidebar');
        $this->load->view('pegawai/index',$data);
        $this->load->view('_partial/footer');
	}

	public function add_data(){
		$nama = $this->input->post('nama');
		$data = array(
			'nama' => $nama,
		);
		$this->m_pegawai->input_data($data);
		$this->session->set_flashdata('berhasil', 'Pegawai berhasil di tambah!');
		redirect(site_url('home/pegawai'));
	}

	public function edit_data($id)
	{
		$read = $this->m_pegawai->read_data(array('idpegawai'=>$id));
		$data = array(
			'judulcontent' => 'Pegawai',
			'id' => $read->row()->idpegawai,
			'nama' => $read->row()->nama,
		);
		$this->load->view('_partial/header');
        $this->load->view('_partial/sidebar');
        $this->load->view('pegawai/edit',$data);
        $this->load->view('_partial/footer');
	}

	public function update_data($id)
	{
		$nama = $this->input->post('nama');
		$this->m_pegawai->update_data(array('idpegawai' => $id),array('nama' => $nama));
		$this->session->set_flashdata('berhasil', 'Pegawai berhasil di diubah!');
		redirect(site_url('home/pegawai'));
	}

	public function hapus_peg($idpeg){
		$this->m_pegawai->hapus_data(array('idpegawai' => $idpeg));
		$this->session->set_flashdata('berhasil', 'Pegawai berhasil di hapus!');
		redirect(site_url('home/pegawai'));
	}
}
