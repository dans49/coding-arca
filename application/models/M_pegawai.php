<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model
{

	public function get_data() {
		return $this->db->get('pegawai');
	}
	public function read_data($where) {
		return $this->db->get_where('pegawai',$where);
	}
	public function input_data($data) {
		$this->db->insert('pegawai',$data);
	}

	public function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('pegawai',$data);
	}

	public function hapus_data($where){
		$this->db->where($where);
		$this->db->delete('pegawai');
	}
	// ==============================================
}