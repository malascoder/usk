<?php

class Crm_model extends CI_Model{
	// public function cari_user($username, $password){
	// 	$query = $this->db->query("select * from user where username='$username' and password= '$password'");
	// 	return $query;
	// }

	function list_bayar(){
		return $this->db->get('pembayaran');
	}

	function levelsimpan(){
		$arraydata = array ('nama_level' => $this->input->post ('namalevel'));
		$this->db->insert('t1_level',$arraydata);
	}
	function registersimpan(){
		$arraydata = array('username' => $this->input->post('username'),
						   'password' => $this->input->post('password'),
						   'usr_level' => $this->input->post('radio'));
		$this->db->insert('user',$arraydata);
	}
	function pembayaran(){
		$arraydata = array('nama' => $this->input->post('nama_siswa'),
						   'kelas' => $this->input->post('kelas'),
						   'bulan' =>$this->input->post('bulan'),
						   'nominal' => $this->input->post('nominal'));
		$this->db->insert('pembayaran',$arraydata);
	}
	function detailordersimpan(){
		$arraydata = array ('id_order' => $this->input->post('idorder'),
							'id_masakan' => $this->input->post('idmasakan'),
							'status_detail_order' => $this->input->post ('statusdetailorder'));
		$this->db->insert('t1_detail_order',$arraydata);
	}
	function makanansimpan(){
		$arraydata = array ('nama_masakan' => $this->input->post('namamasakan'),
							'harga_masakan' => $this->input->post('hargamasakan'),
							'status_masakan' => $this->input->post ('statusmasakan'));
		$this->db->insert('t1_masakan',$arraydata);
	}
	function deletedetailorder(){

	}
	function editdetailorder(){

	}
	function updatedt(){

	}
	function makananedit($id){
		$this->db->where('id_masakan', $id);
		$query = $this->db->get('t1_masakan');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	function updatemakanan(){
		$id = $this->input->post('hiddenmakanan');
			$arraydata = array ('nama_masakan' => $this->input->post('namamasakan'),
							'harga_masakan' => $this->input->post('hargamasakan'),
							'status_masakan' => $this->input->post ('statusmasakan'));
		$this->db->where('id_masakan',$id);
		$this->db->update('t1_masakan', $arraydata);
		//echo $this->db->last_query();
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}	
	public function deletemakanan($id){
		$this->db->where('id_masakan', $id);
		$this->db->delete('t1_masakan');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function deleteorder($id){
		$this->db->where('id_order', $id);
		$this->db->delete('t1_order');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function deletelevel($id){
		$this->db->where('id_level', $id);
		$this->db->delete('t1_level');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false();
		}
	}
	}