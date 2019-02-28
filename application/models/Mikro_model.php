<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mikro_model extends CI_Model {

	public function jumTransaksi()
	{
		
	}
	public function create()
	{
		//$total = $this->input->post('jumlah_gram') * $this->input->post('jumlah_keping');
		$object = array(
            'rekening' => $this->input->post('rekening'),
			'nama_nasabah' => $this->input->post('nama_nasabah'),
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'uang_pinjaman' => str_replace(",","",$this->input->post('uang_pinjaman')),
            'nama_produk' => $this->input->post('nama_produk'),
            'jangka_waktu' => $this->input->post('jangka_waktu'),
            'id_user' => $this->input->post('id_user'),
            'jenis_pinjaman' => $this->input->post('jenis_pinjaman')
		);
		$this->db->insert('mikro', $object);	
	}

	public function delete($id_mikro)
	{
		$this->db->delete('mikro', array('id_mikro' => $id_mikro));
	}

	public function getMikro($id_user)
	{
		$this->db->select('*');
		$this->db->from('mikro');
		$this->db->join('user','mikro.id_user = user.id_user');
		//$this->db->join('cabang','user.id_cabang = cabang.id_cabang');
		$this->db->where('mikro.id_user', $id_user);
		$query = $this->db->get();

		return $query->result();
	}

	public function getMikroCabang($id_cb){
		$this->db->select('*');
		$this->db->from('mikro');
		$this->db->join('user','mikro.id_user = user.id_user');
		$this->db->join('cabang','user.id_cabang = cabang.id_cabang');
		$this->db->where('user.id_cabang', $id_cb);
		$query = $this->db->get();

		return $query->result();
	}

	public function getMikroAdmin(){
		$this->db->select('*');
		$this->db->from('mikro');
		$this->db->join('user','mikro.id_user = user.id_user');
		$query = $this->db->get();

		return $query->result();
	}

	public function selectCabang($id_cabang)
	{
		$this->db->select('*');
		$this->db->from('cabang');
		$this->db->where('id_cabang', $id_cabang);
		$query = $this->db->get();

		return $query->result();
	}

	public function getMikroById($id_mikro)
	{
		$this->db->select('*');
		$this->db->join('user','mikro.id_user = user.id_user');
		$this->db->join('cabang','user.id_cabang = cabang.id_cabang');
		$this->db->where('id_mikro', $id_mikro);
		$query = $this->db->get('mikro',1);
		return $query->result();
	}

	public function update($id_mikro)
	{
		$object = array(
            'rekening' => $this->input->post('rekening'),
			'nama_nasabah' => $this->input->post('nama_nasabah'),
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'uang_pinjaman' => str_replace(",","",$this->input->post('uang_pinjaman')),
            'nama_produk' => $this->input->post('nama_produk'),
            'jangka_waktu' => $this->input->post('jangka_waktu'),
            'id_user' => $this->input->post('id_user'),
            'jenis_pinjaman' => $this->input->post('jenis_pinjaman')
		);
		$this->db->where('id_mikro', $id_mikro);
		$this->db->update('mikro', $object);
	}

	public function updateAdmin($id_mikro)
	{
		$object = array(
            'rekening' => $this->input->post('rekening'),
			'nama_nasabah' => $this->input->post('nama_nasabah'),
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'uang_pinjaman' => str_replace(",","",$this->input->post('uang_pinjaman')),
            'nama_produk' => $this->input->post('nama_produk'),
            'jangka_waktu' => $this->input->post('jangka_waktu'),
            'jenis_pinjaman' => $this->input->post('jenis_pinjaman')
		);
		$this->db->where('id_mikro', $id_mikro);
		$this->db->update('mikro', $object);
	}

	public function cekRekening($rekening){
		$this->db->where('rekening', $rekening);	
		$query = $this->db->get('mikro');
		if($query->num_rows() >=1){
			return false;
		}else{
			return true;
		}
	}

	public function ambildata(){
		$skrng = date("Y-m-d");
		$q = $this->db->query("select d.inisial, SUM(m.uang_pinjaman) as total from mikro as m inner join user as c on m.id_user = c.id_user join cabang as d on c.id_cabang = d.id_cabang  where tanggal_transaksi= '$skrng' group by c.id_cabang")->result_array();
		
		return $q;
	}

	// public function exportmuliaharian(){
	// 	$skrng = date("Y-m-d");
	// 	$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_closing, t.total as gram, t.nilai_pembiayaan as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where tanggal_closing = '$skrng'")->result_array();
	// 	//$q = $this->db->query("select c.nama, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user group by c.id_user")->result_array();
	// 	return $q;
	// }

	public function ambildataminggu(){
		$q = $this->db->query("select d.inisial, SUM(t.uang_pinjaman) as total from mikro as t inner join user as c on t.id_user = c.id_user join cabang as d on c.id_cabang = d.id_cabang where yearweek(`tanggal_transaksi`) = yearweek(curdate()) group by c.id_cabang")->result_array();
		return $q;
	}

	// public function exportmuliamingguan(){
	// 	$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_closing, t.total as gram, t.nilai_pembiayaan as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where yearweek(`tanggal_closing`) = yearweek(curdate())")->result_array();
	// 	return $q;
	// }

	public function ambildatabulan(){
		$q = $this->db->query("select d.inisial, SUM(t.uang_pinjaman) as total from mikro as t inner join user as c on t.id_user = c.id_user  join cabang as d on c.id_cabang = d.id_cabang where MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) group by c.id_cabang")->result_array();
		return $q;
	}

	public function rankCabang(){
		$q = $this->db->query("SELECT cabang.`nama` AS nama_cabang,SUM(mikro.`uang_pinjaman`) AS biaya ,COUNT(mikro.`id_user`) AS transaksi FROM cabang LEFT JOIN `user` ON cabang.`id_cabang`=user.`id_cabang` LEFT JOIN mikro ON user.`id_user` = `mikro`.`id_user` GROUP BY cabang.`id_cabang` ORDER BY biaya DESC")->result();
		return $q;
	}
	public function rankUnit($id){
		$q = $this->db->query("SELECT user.nama as nama ,SUM(mikro.`uang_pinjaman`) as biaya ,COUNT(mikro.`id_user`) as transaksi FROM `user` LEFT JOIN mikro ON user.`id_user` = `mikro`.`id_user` WHERE user.`id_cabang` = '$id' GROUP BY user.`id_user` ORDER BY biaya DESC")->result();
		return $q;
	}

	// public function exportmuliabulanan(){
	// 	$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_closing, t.total as gram, t.nilai_pembiayaan as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where MONTH(tanggal_closing) = MONTH(CURRENT_DATE())")->result_array();
	// 	return $q;
	// }

	public function getJumTransaksi()
	{
		$query = $this->db->query("SELECT COUNT(id_mikro) as total FROM mikro WHERE `tanggal_transaksi` = DATE_FORMAT(NOW(),'%Y-%m-%d');");
		return $query->result();
	}
	public function getJumPembiayaan($value='')
	{
		$query = $this->db->query("SELECT SUM(uang_pinjaman) as total FROM mikro WHERE `tanggal_transaksi` = DATE_FORMAT(NOW(),'%Y-%m-%d');");
		return $query->result();
	}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
?>