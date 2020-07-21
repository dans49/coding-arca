<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_beranda');
	}

	public function index()
	{
		$data = array(
			'judulcontent' => 'Selamat Datang',
			'pegawai' => $this->m_beranda->pegawai(),
			'pembayaran' => number_format($this->m_beranda->jumlah_pembayaran()).',-',
		);
        $this->load->view('_partial/header');
        $this->load->view('_partial/sidebar');
        $this->load->view('bayar_bonus/index',$data);
        $this->load->view('_partial/footer');
	}

	public function savebayar(){
		$pembayaran = $this->input->post('pembayaran');
		for ($i=0; $i < count($this->input->post('id')); $i++) { 
			$bonus = ($pembayaran * $this->input->post('persen')[$i])/100;
			$data = array(
				'idpegawai' => $this->input->post('id')[$i],
				'bayar' => $pembayaran,
				'persentase' => $this->input->post('persen')[$i],
				'total_bonus' => $bonus
			);
			$this->m_beranda->input_data($data);
		}
		// echo json_encode($data);

	}
}
