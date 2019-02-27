<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function jumTransaksi()
	{
		
	}
	public function create()
	{
		//$total = $this->input->post('jumlah_gram') * $this->input->post('jumlah_keping');
		$object = array(
			'nama_nasabah' => $this->input->post('nama_nasabah'),
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'uang_pinjaman' => $this->input->post('uang_pinjaman'),
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
		$this->db->where('id_user', $id_user);
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
		$this->db->where('id_mikro', $id_mikro);
		$query = $this->db->get('mikro',1);
		return $query->result();
	}

	public function update($id_mikro)
	{
		$object = array(
			'nama_nasabah' => $this->input->post('nama_nasabah'),
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'uang_pinjaman' => $this->input->post('uang_pinjaman'),
            'nama_produk' => $this->input->post('nama_produk'),
            'jangka_waktu' => $this->input->post('jangka_waktu'),
            'id_user' => $this->input->post('id_user'),
            'jenis_pinjaman' => $this->input->post('jenis_pinjaman')
		);
		$this->db->where('id_mikro', $id_mikro);
		$this->db->update('mikro', $object);
	}

	// public function ambildata(){
	// 	$skrng = date("Y-m-d");
	// 	$q = $this->db->query("select d.inisial, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user join cabang as d on c.id_cabang = d.id_cabang  where tanggal_closing = '$skrng' group by c.id_cabang")->result_array();
		
	// 	return $q;
	// }

	// public function exportmuliaharian(){
	// 	$skrng = date("Y-m-d");
	// 	$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_closing, t.total as gram, t.nilai_pembiayaan as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where tanggal_closing = '$skrng'")->result_array();
	// 	//$q = $this->db->query("select c.nama, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user group by c.id_user")->result_array();
	// 	return $q;
	// }

	// public function ambildataminggu(){
	// 	$q = $this->db->query("select c.nama, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where yearweek(`tanggal_closing`) = yearweek(curdate()) group by c.id_user")->result_array();
	// 	return $q;
	// }

	// public function exportmuliamingguan(){
	// 	$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_closing, t.total as gram, t.nilai_pembiayaan as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where yearweek(`tanggal_closing`) = yearweek(curdate())")->result_array();
	// 	return $q;
	// }

	// public function ambildatabulan(){
	// 	$q = $this->db->query("select c.nama, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where MONTH(tanggal_closing) = MONTH(CURRENT_DATE()) group by c.id_user")->result_array();
	// 	return $q;
	// }

	// public function exportmuliabulanan(){
	// 	$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_closing, t.total as gram, t.nilai_pembiayaan as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where MONTH(tanggal_closing) = MONTH(CURRENT_DATE())")->result_array();
	// 	return $q;
	// }
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
?>