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
		//$this->db->join('cabang','user.id_cabang = cabang.id_cabang');
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
	// 	$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_transaksi, t.total as gram, t.uang_pinjaman as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where tanggal_transaksi = '$skrng'")->result_array();
	// 	//$q = $this->db->query("select c.nama, SUM(t.total) as gram, SUM(t.uang_pinjaman) as biaya from transaksi as t inner join user as c on t.id_user = c.id_user group by c.id_user")->result_array();
	// 	return $q;
	// }

	public function ambildataminggu(){
		$q = $this->db->query("select d.inisial, SUM(t.uang_pinjaman) as total from mikro as t inner join user as c on t.id_user = c.id_user join cabang as d on c.id_cabang = d.id_cabang where yearweek(`tanggal_transaksi`) = yearweek(curdate()) group by c.id_cabang")->result_array();
		return $q;
	}

	// public function exportmuliamingguan(){
	// 	$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_transaksi, t.total as gram, t.uang_pinjaman as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where yearweek(`tanggal_transaksi`) = yearweek(curdate())")->result_array();
	// 	return $q;
	// }

	public function ambildatabulan($bulan){
	    if($bulan==0){
		$q = $this->db->query("select d.inisial, SUM(t.uang_pinjaman) as total from mikro as t inner join user as c on t.id_user = c.id_user  join cabang as d on c.id_cabang = d.id_cabang where MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) and YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE()) group by c.id_cabang")->result_array();
	    }else{
	    $q = $this->db->query("select d.inisial, SUM(t.uang_pinjaman) as total from mikro as t inner join user as c on t.id_user = c.id_user  join cabang as d on c.id_cabang = d.id_cabang where MONTH(tanggal_transaksi) = $bulan and YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE()) group by c.id_cabang")->result_array();
	    }
		return $q;
	}
	
		public function rankCabang($bulan){
		if($bulan==0){
		$q = $this->db->query("SELECT d.`nama` AS nama_cabang, trans.gram AS transaksi ,trans.biaya FROM (SELECT c.`id_cabang`,COUNT(t.uang_pinjaman) AS gram, SUM(t.uang_pinjaman) AS biaya FROM mikro AS t 
        JOIN `user` AS c ON t.id_user = c.id_user WHERE DATE_FORMAT(t.`tanggal_transaksi`,'%m') = month(now()) AND DATE_FORMAT(t.`tanggal_transaksi`,'%Y') = YEAR(NOW()) GROUP BY c.id_cabang) AS trans
        RIGHT JOIN cabang AS d ON trans.id_cabang = d.id_cabang GROUP BY d.id_cabang order by biaya desc")->result();
        		}else{
        			$q = $this->db->query("SELECT d.`nama` AS nama_cabang,trans.gram AS transaksi ,trans.biaya FROM (SELECT c.`id_cabang`,COUNT(t.uang_pinjaman) AS gram, SUM(t.uang_pinjaman) AS biaya FROM mikro AS t 
        JOIN `user` AS c ON t.id_user = c.id_user WHERE DATE_FORMAT(t.`tanggal_transaksi`,'%m') = '$bulan' AND DATE_FORMAT(t.`tanggal_transaksi`,'%Y') = YEAR(NOW()) GROUP BY c.id_cabang) AS trans
        RIGHT JOIN cabang AS d ON trans.id_cabang = d.id_cabang GROUP BY d.id_cabang order by biaya desc")->result();
		}
		return $q;
	}
	
	public function rankUnitAdmin($bulan){
		if($bulan==0){
		$q = $this->db->query("SELECT c.`nama` AS nama,trans.gram AS transaksi ,trans.biaya FROM (SELECT t.`id_user`,COUNT(t.uang_pinjaman) AS gram, SUM(t.uang_pinjaman) AS biaya 
		FROM mikro AS t where MONTH(t.tanggal_transaksi) = MONTH(CURRENT_DATE()) and YEAR(t.tanggal_transaksi) = YEAR(CURRENT_DATE()) GROUP BY t.`id_user`) 
		AS trans RIGHT JOIN `user` AS c ON trans.id_user = c.id_user GROUP BY c.`id_user` ORDER BY biaya DESC
")->result();
		}else{
		$q = $this->db->query("SELECT c.`nama` AS nama,trans.gram AS transaksi ,trans.biaya FROM (SELECT t.`id_user`,COUNT(t.uang_pinjaman) AS gram, SUM(t.uang_pinjaman) AS biaya 
		FROM mikro AS t where MONTH(t.tanggal_transaksi) = '$bulan' and YEAR(t.tanggal_transaksi) = YEAR(CURRENT_DATE()) GROUP BY t.`id_user`) 
		AS trans RIGHT JOIN `user` AS c ON trans.id_user = c.id_user GROUP BY c.`id_user` ORDER BY biaya DESC")->result();
		}
			return $q;

	}
	public function rankUnit($bulan,$id){
		if($bulan==0){
		$q = $this->db->query("SELECT c.`nama` AS nama,trans.gram AS transaksi ,trans.biaya FROM (SELECT t.`id_user`,COUNT(t.uang_pinjaman) AS gram, SUM(t.uang_pinjaman) AS biaya 
		FROM mikro AS t where MONTH(t.tanggal_transaksi) = MONTH(CURRENT_DATE()) and YEAR(t.tanggal_transaksi) = YEAR(CURRENT_DATE()) GROUP BY t.`id_user`) 
		AS trans RIGHT JOIN `user` AS c ON trans.id_user = c.id_user where c.id_cabang = '$id' GROUP BY c.`id_user` ORDER BY biaya DESC
")->result();
		}else{
		$q = $this->db->query("SELECT c.`nama` AS nama,trans.gram AS transaksi ,trans.biaya FROM (SELECT t.`id_user`,COUNT(t.uang_pinjaman) AS gram, SUM(t.uang_pinjaman) AS biaya 
		FROM mikro AS t where MONTH(t.tanggal_transaksi) = '$bulan' and YEAR(t.tanggal_transaksi) = YEAR(CURRENT_DATE()) GROUP BY t.`id_user`) 
		AS trans RIGHT JOIN `user` AS c ON trans.id_user = c.id_user where c.id_cabang = '$id' GROUP BY c.`id_user` ORDER BY biaya DESC")->result();
		}
		return $q;
	}


	// public function exportmuliabulanan(){
	// 	$q = $this->db->query("select c.nama,t.nama_nasabah, t.jangka_waktu, t.tanggal_transaksi, t.total as gram, t.uang_pinjaman as biaya from transaksi as t inner join user as c on t.id_user = c.id_user where MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE())")->result_array();
	// 	return $q;
	// }

	public function getJumTransaksi($bulan)
	{
		if($bulan=="0"){
		$query = $this->db->query("SELECT COUNT(id_mikro) as total FROM mikro WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) and YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE())");
		}else{
		$query = $this->db->query("SELECT COUNT(id_mikro) as total FROM mikro WHERE MONTH(tanggal_transaksi) = $bulan and YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE())");	
		}
		return $query->result_array();
	}
	public function getJumPembiayaan($bulan)
	{
		if($bulan=="0"){
		$query = $this->db->query("SELECT SUM(uang_pinjaman) as total FROM mikro WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) and YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE())");
		}else{
			$query = $this->db->query("SELECT SUM(uang_pinjaman) as total FROM mikro WHERE MONTH(tanggal_transaksi) = $bulan and YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE())");	
		}
		return $query->result_array();
	}

	public function transaksiMikro($tahun,$id){
		$q = $this->db->query("SELECT bulan.`bulan`,mikro.biaya,mikro.transaksi FROM (SELECT cabang.`id_cabang`,SUM(mikro.`uang_pinjaman`)AS biaya, mikro.`tanggal_transaksi` AS bulan,COUNT(mikro.`id_user`) AS transaksi FROM mikro JOIN `user` ON mikro.`id_user`=user.`id_user` JOIN cabang ON cabang.`id_cabang`=user.`id_cabang` WHERE DATE_FORMAT(mikro.`tanggal_transaksi`,'%Y') = '$tahun' AND user.`id_cabang`='$id' GROUP BY DATE_FORMAT(mikro.`tanggal_transaksi`,'%m')) AS mikro RIGHT JOIN bulan ON bulan.`id_bulan`= DATE_FORMAT(mikro.bulan,'%m') ORDER BY bulan.`id_bulan` ASC")->result();
		return $q;
	}

	public function getAllTransaksiCabang($id,$bulan)
	{
		$query = $this->db->query("SELECT * FROM mikro JOIN `user` ON user.`id_user` = mikro.`id_user`JOIN cabang ON user.`id_cabang` = cabang.`id_cabang` WHERE cabang.`id_cabang` = '$id' AND DATE_FORMAT(`mikro`.`tanggal_transaksi`,'%m') = '$bulan' ");
		return $query->result();
	}
	
	public function getRollover($bulan)
	{
	    if($bulan=="0")
	    {
	       $query = $this->db->query("SELECT sum(mikro.uang_pinjaman) as total from mikro WHERE mikro.jenis_pinjaman = 'rollover' and month(mikro.tanggal_transaksi)=month(now()) and year(mikro.tanggal_transaksi)=year(now())");
	    }
	    else
	    {
	       $query = $this->db->query("SELECT sum(mikro.uang_pinjaman) as total from mikro WHERE mikro.jenis_pinjaman = 'rollover' and month(mikro.tanggal_transaksi)='$bulan' and year(mikro.tanggal_transaksi)=year(now())");
	    }
	    return $query->result();
		
	}
	public function getBaru($bulan)
	{
	    if($bulan=="0")
	    {
	       $query = $this->db->query("SELECT sum(mikro.uang_pinjaman) as total from mikro WHERE mikro.jenis_pinjaman = 'baru' and month(mikro.tanggal_transaksi)=month(now()) and year(mikro.tanggal_transaksi)=year(now())");
	    }
	    else
	    {
	       $query = $this->db->query("SELECT sum(mikro.uang_pinjaman) as total from mikro WHERE mikro.jenis_pinjaman = 'baru' and month(mikro.tanggal_transaksi)='$bulan' and year(mikro.tanggal_transaksi)=year(now())");
	    }
	    return $query->result();
		
	}
	
}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
?>