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
            // 'jumlah_keping' => $this->input->post('jumlah_keping'),
            // 'jumlah_gram' => $this->input->post('jumlah_gram'),
            'total' => $this->input->post('total'),
            'nilai_pembiayaan' => str_replace(",","",$this->input->post('nilai_pembiayaan')),
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
		$this->db->join('user','transaksi.id_user = user.id_user');
		//$this->db->join('cabang','user.id_cabang = cabang.id_cabang');
		$this->db->where('transaksi.id_user', $id_user);
		$query = $this->db->get();

		return $query->result();
	}

	public function getTransaksiCabang($idcb){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('user','transaksi.id_user = user.id_user');
		//$this->db->join('cabang','user.id_cabang = cabang.id_cabang');
		$this->db->where('user.id_cabang', $idcb);
		$query = $this->db->get();
		return $query->result();
	}

	public function getTransaksiAdmin(){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('user','transaksi.id_user = user.id_user');
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
            // 'jumlah_keping' => $this->input->post('jumlah_keping'),
            // 'jumlah_gram' => $this->input->post('jumlah_gram'),
            'total' => $this->input->post('total'),
            'nilai_pembiayaan' => str_replace(",","",$this->input->post('nilai_pembiayaan')),
            'jangka_waktu' => $this->input->post('jangka_waktu'),
            'id_user' => $this->input->post('id_user')
		);
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi', $object);
	}

	public function updateAdmin($id_transaksi)
	{
		$total = $this->input->post('jumlah_gram') * $this->input->post('jumlah_keping');
		$object = array(
			'rekening' => $this->input->post('rekening'),
			'nama_nasabah' => $this->input->post('nama_nasabah'),
            'tanggal_closing' => $this->input->post('tanggal_closing'),
            'jumlah_keping' => $this->input->post('jumlah_keping'),
            'jumlah_gram' => $this->input->post('jumlah_gram'),
            'total' => $total,
            'nilai_pembiayaan' => str_replace(",","",$this->input->post('nilai_pembiayaan')),
            'jangka_waktu' => $this->input->post('jangka_waktu')
		);
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi', $object);
	}

public function getJumTransaksi($bulan)
	{
		if($bulan=="0"){
		$query = $this->db->query("SELECT COUNT(id_transaksi) as total FROM transaksi WHERE MONTH(tanggal_closing) = MONTH(CURRENT_DATE()) and YEAR(tanggal_closing) = YEAR(CURRENT_DATE())");
		}else{
		$query = $this->db->query("SELECT COUNT(id_transaksi) as total FROM transaksi WHERE MONTH(tanggal_closing) = $bulan and YEAR(tanggal_closing) = YEAR(CURRENT_DATE())");	
		}
		return $query->result_array();
	}
	public function getJumPembiayaan($bulan)
	{
		if($bulan=="0"){
		$query = $this->db->query("SELECT SUM(nilai_pembiayaan) as total FROM transaksi  WHERE MONTH(tanggal_closing) = MONTH(CURRENT_DATE()) and YEAR(tanggal_closing) = YEAR(CURRENT_DATE())");
		}else{
			$query = $this->db->query("SELECT SUM(nilai_pembiayaan) as total FROM transaksi  WHERE MONTH(tanggal_closing) = $bulan and YEAR(tanggal_closing) = YEAR(CURRENT_DATE())");	
		}
		return $query->result_array();
	}
	
	public function getJumEmas($bulan)
	{
		if($bulan=="0"){
		$query = $this->db->query("SELECT SUM(jumlah_gram) AS total FROM transaksi WHERE MONTH(tanggal_closing) = MONTH(CURRENT_DATE()) and YEAR(tanggal_closing) = YEAR(CURRENT_DATE()) ");
		}else{
		$query = $this->db->query("SELECT SUM(jumlah_gram) AS total FROM transaksi WHERE MONTH(tanggal_closing) = $bulan and YEAR(tanggal_closing) = YEAR(CURRENT_DATE()) ");
		}
		return $query->result_array();
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

    public function ambildatabulan($bulan){
		if($bulan==0){
		$q = $this->db->query("select d.inisial, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user join cabang as d on c.id_cabang = d.id_cabang where MONTH(tanggal_closing) = MONTH(CURRENT_DATE()) and YEAR(tanggal_closing) = YEAR(CURRENT_DATE()) group by c.id_cabang")->result_array();
		}else{
		$q = $this->db->query("select d.inisial, SUM(t.total) as gram, SUM(t.nilai_pembiayaan) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user join cabang as d on c.id_cabang = d.id_cabang where MONTH(tanggal_closing) = $bulan and YEAR(tanggal_closing) = YEAR(CURRENT_DATE()) group by c.id_cabang")->result_array();
		}
		return $q;
	}

	public function exportmuliabulanan($bulan,$tahun){
		$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_closing, t.total as gram, t.nilai_pembiayaan as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where MONTH(tanggal_closing) = $bulan and YEAR(tanggal_closing) = $tahun")->result_array();
		return $q;
	}
	
	public function rankCabang($bulan){
		if($bulan==0){
		$q = $this->db->query("SELECT d.`nama` AS nama_cabang,trans.gram AS transaksi ,trans.biaya FROM (SELECT c.`id_cabang`,COUNT(t.total) AS gram, SUM(t.nilai_pembiayaan) AS biaya FROM transaksi AS t 
JOIN `user` AS c ON t.id_user = c.id_user WHERE DATE_FORMAT(t.`tanggal_closing`,'%m') = month(now()) AND DATE_FORMAT(t.`tanggal_closing`,'%Y') = YEAR(NOW()) GROUP BY c.id_cabang) AS trans
RIGHT JOIN cabang AS d ON trans.id_cabang = d.id_cabang GROUP BY d.id_cabang order by biaya desc")->result();
		}else{
			$q = $this->db->query("SELECT d.`nama` AS nama_cabang,trans.gram AS transaksi ,trans.biaya FROM (SELECT c.`id_cabang`,COUNT(t.total) AS gram, SUM(t.nilai_pembiayaan) AS biaya FROM transaksi AS t 
JOIN `user` AS c ON t.id_user = c.id_user WHERE DATE_FORMAT(t.`tanggal_closing`,'%m') = '$bulan' AND DATE_FORMAT(t.`tanggal_closing`,'%Y') = YEAR(NOW()) GROUP BY c.id_cabang) AS trans
RIGHT JOIN cabang AS d ON trans.id_cabang = d.id_cabang GROUP BY d.id_cabang order by biaya desc")->result();
		}
		return $q;
	}
	
	public function rankUnitAdmin($bulan){
		if($bulan==0){
		$q = $this->db->query("SELECT c.`nama` AS nama,trans.gram AS transaksi ,trans.biaya FROM (SELECT t.`id_user`,COUNT(t.total) AS gram, SUM(t.nilai_pembiayaan) AS biaya 
		FROM transaksi AS t where MONTH(t.tanggal_closing) = MONTH(CURRENT_DATE()) and YEAR(t.tanggal_closing) = YEAR(CURRENT_DATE()) GROUP BY t.`id_user`) 
		AS trans RIGHT JOIN `user` AS c ON trans.id_user = c.id_user GROUP BY c.`id_user` ORDER BY biaya DESC
")->result();
		}else{
		$q = $this->db->query("SELECT c.`nama` AS nama,trans.gram AS transaksi ,trans.biaya FROM (SELECT t.`id_user`,COUNT(t.total) AS gram, SUM(t.nilai_pembiayaan) AS biaya 
		FROM transaksi AS t where MONTH(t.tanggal_closing) = '$bulan' and YEAR(t.tanggal_closing) = YEAR(CURRENT_DATE()) GROUP BY t.`id_user`) 
		AS trans RIGHT JOIN `user` AS c ON trans.id_user = c.id_user GROUP BY c.`id_user` ORDER BY biaya DESC")->result();
		}
			return $q;

	}
	public function rankUnit($bulan,$id){
		if($bulan==0){
		$q = $this->db->query("SELECT c.`nama` AS nama,trans.gram AS transaksi ,trans.biaya FROM (SELECT t.`id_user`,COUNT(t.total) AS gram, SUM(t.nilai_pembiayaan) AS biaya 
		FROM transaksi AS t where MONTH(t.tanggal_closing) = MONTH(CURRENT_DATE()) and YEAR(t.tanggal_closing) = YEAR(CURRENT_DATE()) GROUP BY t.`id_user`) 
		AS trans RIGHT JOIN `user` AS c ON trans.id_user = c.id_user where c.id_cabang = '$id' GROUP BY c.`id_user` ORDER BY biaya DESC
")->result();
		}else{
		$q = $this->db->query("SELECT c.`nama` AS nama,trans.gram AS transaksi ,trans.biaya FROM (SELECT t.`id_user`,COUNT(t.total) AS gram, SUM(t.nilai_pembiayaan) AS biaya 
		FROM transaksi AS t where MONTH(t.tanggal_closing) = '$bulan' and YEAR(t.tanggal_closing) = YEAR(CURRENT_DATE()) GROUP BY t.`id_user`) 
		AS trans RIGHT JOIN `user` AS c ON trans.id_user = c.id_user where c.id_cabang = '$id' GROUP BY c.`id_user` ORDER BY biaya DESC")->result();
		}
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
	public function transaksiMulia($id,$tahun){
		$q = $this->db->query("SELECT bulan.`bulan`,mulia.transaksi,mulia.biaya FROM (SELECT SUM(transaksi.`nilai_pembiayaan`) AS biaya,COUNT(transaksi.`id_user`) AS transaksi,transaksi.`tanggal_closing`
			FROM transaksi WHERE id_user = '$id' AND DATE_FORMAT(transaksi.`tanggal_closing`,'%Y')='$tahun'
			GROUP BY DATE_FORMAT(transaksi.`tanggal_closing`,'%m'))AS
			mulia RIGHT JOIN bulan ON DATE_FORMAT(mulia.`tanggal_closing`,'%m') = bulan.id_bulan ORDER BY bulan.`id_bulan`")->result();
		return $q;
	}
	public function getAllTransaksiAdmin($tahun,$id)
	{
		$query = $this->db->query("SELECT bulan.`bulan`,areas.biaya,areas.transaksi FROM(SELECT cabang.`id_cabang`,SUM(transaksi.`nilai_pembiayaan`) AS biaya, transaksi.`tanggal_closing` AS bulan,COUNT(transaksi.`id_user`) AS transaksi FROM transaksi JOIN `user` ON transaksi.`id_user`=user.`id_user` JOIN cabang ON cabang.`id_cabang`=user.`id_cabang` WHERE DATE_FORMAT(tanggal_closing,'%Y') = '2019' AND user.`id_cabang`='$id' GROUP BY DATE_FORMAT(transaksi.`tanggal_closing`,'%m')) AS areas RIGHT JOIN bulan ON bulan.`id_bulan`= DATE_FORMAT(areas.bulan,'%m') ORDER BY bulan.`id_bulan` ASC");
		return $query->result();
	}

	public function getAllTransaksiCabang($id,$bulan)
	{
		$query = $this->db->query("SELECT cabang.`nama`, user.`id_cabang`, transaksi.`id_transaksi`, transaksi.`rekening`,transaksi.`nama_nasabah`,transaksi.`tanggal_closing`,transaksi.`total`, transaksi.`nilai_pembiayaan` FROM transaksi JOIN `user` ON user.`id_user` = transaksi.`id_user`JOIN cabang ON user.`id_cabang` = cabang.`id_cabang` WHERE cabang.`id_cabang` = '$id' and DATE_FORMAT(transaksi.`tanggal_closing`,'%m') = '$bulan' ");
		return $query->result();
	}
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
?>