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
			'rekening' => $this->input->post('rekening'),
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

	public function selectCabang($id_cabang)
	{
		$this->db->select('*');
		$this->db->from('cabang');
		$this->db->where('id_cabang', $id_cabang);
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
			'rekening' => $this->input->post('rekening'),
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

	public function getJumTransaksi()
	{
		$query = $this->db->query("SELECT COUNT(id_transaksi) as total FROM transaksi WHERE `tanggal_closing` = DATE_FORMAT(NOW(),'%Y-%m-%d');");
		return $query->result();
	}
	public function getJumPembiayaan($value='')
	{
		$query = $this->db->query("SELECT SUM(nilai_pembiayaan) as total FROM transaksi WHERE `tanggal_closing` = DATE_FORMAT(NOW(),'%Y-%m-%d');");
		return $query->result();
	}
	
	public function getJumEmas($value='')
	{
		$query = $this->db->query("SELECT SUM(jumlah_gram) AS total FROM transaksi WHERE `tanggal_closing` = DATE_FORMAT(NOW(),'%Y-%m-%d');");
		return $query->result();
	}


	public function ambildata(){
		$skrng = date("Y-m-d");
		$q = $this->db->query("select d.inisial, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user join cabang as d on c.id_cabang = d.id_cabang  where tanggal_closing = '$skrng' group by c.id_cabang")->result_array();
		
		return $q;
	}

	public function exportmuliaharian(){
		$skrng = date("Y-m-d");
		$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_closing, t.total as gram, t.nilai_pembiayaan as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where tanggal_closing = '$skrng'")->result_array();
		//$q = $this->db->query("select c.nama, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user group by c.id_user")->result_array();
		return $q;
	}

	public function ambildataminggu(){
		$q = $this->db->query("select d.inisial, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user join cabang as d on c.id_cabang = d.id_cabang where yearweek(`tanggal_closing`) = yearweek(curdate()) group by c.id_cabang")->result_array();
		return $q;
	}

	public function exportmuliamingguan(){
		$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_closing, t.total as gram, t.nilai_pembiayaan as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where yearweek(`tanggal_closing`) = yearweek(curdate())")->result_array();
		return $q;
	}

	public function ambildatabulan(){
		$q = $this->db->query("select d.inisial, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user join cabang as d on c.id_cabang = d.id_cabang where MONTH(tanggal_closing) = MONTH(CURRENT_DATE()) group by c.id_cabang")->result_array();
		return $q;
	}

	public function exportmuliabulanan(){
		$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_closing, t.total as gram, t.nilai_pembiayaan as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where MONTH(tanggal_closing) = MONTH(CURRENT_DATE())")->result_array();
		return $q;
	}
	
	public function rankCabang(){
		$q = $this->db->query("SELECT cabang.nama AS nama_cabang, COUNT(user.nama) AS transaksi, SUM(transaksi.nilai_pembiayaan) AS biaya FROM transaksi JOIN `user` ON user.`id_user`=transaksi.`id_user` JOIN cabang ON cabang.`id_cabang`=user.`id_cabang` GROUP BY user.id_cabang ORDER BY biaya DESC")->result();
		return $q;
	}

	public function rankUnit($id){
		$q = $this->db->query("SELECT user.`id_cabang`,user.nama, SUM(transaksi.nilai_pembiayaan) AS biaya, COUNT(user.id_cabang) AS transaksi FROM transaksi JOIN `user` ON user.`id_user`=transaksi.`id_user` WHERE user.`id_cabang`='6' GROUP BY transaksi.id_user ORDER BY biaya DESC")->result();
		return $q;
	}
	public function cekRekening($rekening){
		$this->db->where('rekening', $rekening);	
		$query = $this->db->get('transaksi');
		if($query->num_rows() >=1){
			return false;
		}else{
			return true;
		}
	}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
?>