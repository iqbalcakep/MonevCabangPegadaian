<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function jumTransaksi()
	{
		
	}
	public function create()
	{
		$total = $this->input->post('jumlah_gram') * $this->input->post('jumlah_keping');
		$object = array(
			'nama_nasabah' => $this->input->post('nama_nasabah'),
            'tanggal_closing' => $this->input->post('tanggal_closing'),
            'jumlah_keping' => $this->input->post('jumlah_keping'),
            'jumlah_gram' => $this->input->post('jumlah_gram'),
            'total' => $total,
            'nilai_pembiayaan' => $this->input->post('nilai_pembiayaan'),
            'jangka_waktu' => $this->input->post('jangka_waktu'),
            'id_user' => $this->input->post('id_user')
		);
		$this->db->insert('transaksi', $object);	
	}

	public function delete($id_transaksi)
	{
		$this->db->delete('transaksi', array('id_transaksi' => $id_transaksi));
	}

	public function getTransaksi($id_user)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get();

		return $query->result();
	}

	public function getTransaksiById($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$query = $this->db->get('transaksi',1);
		return $query->result();
	}

	public function update($id_transaksi)
	{
		$total = $this->input->post('jumlah_gram') * $this->input->post('jumlah_keping');
		$object = array(
			'nama_nasabah' => $this->input->post('nama_nasabah'),
            'tanggal_closing' => $this->input->post('tanggal_closing'),
            'jumlah_keping' => $this->input->post('jumlah_keping'),
            'jumlah_gram' => $this->input->post('jumlah_gram'),
            'total' => $total,
            'nilai_pembiayaan' => $this->input->post('nilai_pembiayaan'),
            'jangka_waktu' => $this->input->post('jangka_waktu'),
            'id_user' => $this->input->post('id_user')
		);
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi', $object);
	}

	public function ambildata(){
		$skrng = date("Y-m-d");
		$q = $this->db->query("select d.inisial, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user join cabang as d on c.id_cabang = d.id_cabang  where tanggal_closing = '$skrng' group by c.id_cabang")->result_array();
		
		return $q;
	}

	public function ambildataminggu(){
		$q = $this->db->query("select c.nama, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where yearweek(`tanggal_closing`) = yearweek(curdate()) group by c.id_user")->result_array();
		return $q;
	}

	public function ambildatabulan(){
		$q = $this->db->query("select c.nama, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where MONTH(tanggal_closing) = MONTH(CURRENT_DATE()) group by c.id_user")->result_array();
		return $q;
	}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
?>