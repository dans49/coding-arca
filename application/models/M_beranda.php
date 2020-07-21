<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_beranda extends CI_Model
{

	public function pegawai() {
		return $this->db->get('pegawai');
	}

	public function jumlah_pembayaran() {
		$this->db->select_sum('bayar');
		$query = $this->db->get('tot_bayar_bonus');

		if($query->num_rows() > 0){
			return $query->row()->bayar;
		} else {
			return 0;
		}
	}

	public function input_data($data) {
		$this->db->insert('tot_bayar_bonus',$data);
	}

	
	public function read_data($where,$table) {
		return $this->db->get_where($table,$where);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}