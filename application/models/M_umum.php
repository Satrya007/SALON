<?php

class M_umum extends CI_model
{

	function get_data($tabel)
	{
		$query = $this->db->get($tabel);
		return $query->result();
	}
	function get_booking($tgl_booking)
	{
		$query = $this->db->query("select * from transaksi where tgl_booking='$tgl_booking' ");
		return $query;

	}

	function ambil_data($tabel, $kolom = FALSE, $id = FALSE)
	{
		if ($id === FALSE) {
			$q = $this->db->get($tabel);
			return $q->result();
		}
		$q = $this->db->get_where($tabel, array($kolom => $id));
		return $q->row();
	}
	public function hitung_service($tabel, $kolom = FALSE, $id = FALSE)
	{
		$query = $this->db->get_where($tabel, array($kolom => $id));
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	function hapus($tabel, $kolom, $id)
	{
		$this->db->delete($tabel, array($kolom => $id));
	}
	function set_data($tabel)
	{
		$data = $this->input->post(null, TRUE);
		array_pop($data);
		return $this->db->insert($tabel, $data);
	}
	function input_data($data, $table)
	{
		// Jika table adalah pelanggan dan id_pelanggan belum ada
		if($table == 'pelanggan' && !isset($data['id_pelanggan'])) {
			$data['id_pelanggan'] = $this->get_id_pelanggan();
		}
		return $this->db->insert($table, $data);
	}
	function UpdateData($tabelName, $data, $where)
	{
		$res = $this->db->update($tabelName, $data, $where);
		return $res;
	}
	function update_data($tabel)
	{
		$data = $this->input->post(null, TRUE);
		$primary = array_slice($data, 0, 1);
		array_shift($data);
		array_pop($data);
		$this->db->where($primary);
		$this->db->update($tabel, $data);
	}

	function hapus_data($tabel, $kolom, $id)
	{
		$this->db->delete($tabel, array($kolom => $id));
		if (!$this->db->affected_rows())
			return (FALSE);
		else
			return (TRUE);
	}
	function get_pelanggan($username)
	{

		return $this->db->get_where('pelanggan', array('username' => $username));

	}

	function get_service()
	{

		$this->db->select('*');
		$this->db->from('service a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', '');

		$query = $this->db->get();
		return $query->result();
	}
	function get_service_site()
	{

		$this->db->select('*');
		$this->db->from('service a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', '');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}
	function get_gallery()
	{

		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->order_by('tgl_upload desc');
		$this->db->limit(4);

		$query = $this->db->get();
		return $query->result();
	}
	function get_gallery_all()
	{

		$this->db->select('*');
		$this->db->from('gallery');
		$this->db->order_by('tgl_upload desc');

		$query = $this->db->get();
		return $query->result();
	}
	function get_testimoni_all()
	{

		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->order_by('tgl_testimoni desc');

		$query = $this->db->get();
		return $query->result();
	}
	function get_testimoni()
	{

		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->order_by('tgl_testimoni desc');
		$this->db->limit(4);

		$query = $this->db->get();
		return $query->result();
	}
	function get_kategori()
	{

		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->limit(6);

		$query = $this->db->get();
		return $query->result();
	}
	function get_pesanan_saya()
{
    $id_pelanggan = $this->session->userdata('id_pelanggan');
    
    // Debug: Pastikan id_pelanggan diambil dengan benar
    if(!$id_pelanggan) {
        return [];  // Jika tidak ada id_pelanggan, kembalikan array kosong
    }

    $this->db->select('a.*, b.nama_service, b.durasi, b.biaya, c.nama_pelanggan');
    $this->db->from('transaksi a');
    $this->db->join('service b', 'a.id_service = b.id_service', 'left');
    $this->db->join('pelanggan c', 'a.id_pelanggan = c.id_pelanggan', 'left');
    $this->db->where('a.id_pelanggan', $id_pelanggan);
    $this->db->order_by('a.tgl_transaksi desc');

    $query = $this->db->get();

    // Debug: Periksa apakah ada data yang dikembalikan
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return [];  // Jika tidak ada data, kembalikan array kosong
    }
}


function get_transaksi()
{
    // $this->db->select('*');
    // $this->db->from('transaksi a');
    // $this->db->join('service b', 'a.id_service = b.id_service', 'left');
    // $this->db->join('pelanggan c', 'a.id_pelanggan = c.id_pelanggan', 'left');
    // $this->db->order_by('a.tgl_transaksi desc');
	$this->db->select('a.*, b.*, c.nama_pelanggan, c.no_telp');
	$this->db->from('transaksi a');
	$this->db->join('service b', 'a.id_service = b.id_service', 'left');
	$this->db->join('pelanggan c', 'a.id_pelanggan = c.id_pelanggan', 'left');
	$this->db->order_by('a.tgl_transaksi', 'desc');
	$query = $this->db->get();

    // Debug: Periksa apakah ada data yang dikembalikan
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return [];  // Jika tidak ada data, kembalikan array kosong
    }
}

	function get_transaksi_keuangan($dari, $sampai)
	{

		$this->db->select('*');
		$this->db->from('transaksi a');
		$this->db->join('service b', 'a.id_service=b.id_service', '');
		$this->db->join('pelanggan c', 'a.id_pelanggan=c.id_pelanggan', '');
		$this->db->where('a.tgl_booking between "' . $dari . '" and "' . $sampai . '"');
		$this->db->where('a.status', 4);
		$query = $this->db->get();
		return $query->result();
	}

	function get_booking_slot($tgl, $jam, $id_service)
	{
		$query = $this->db->query("select * from transaksi where tgl_booking='$tgl' AND jam='$jam' AND id_service='$id_service' ");
		return $query;
	}

	// Tambahkan fungsi ini di dalam model M_umum
	public function check_slot($tgl_booking, $jam_booking, $id_service)
	{
		$query = $this->db->query("SELECT * FROM transaksi WHERE tgl_booking = '$tgl_booking' AND jam = '$jam_booking' AND id_service = '$id_service'");
		return $query->num_rows() < 3; // Asumsi maksimal 3 slot per jam untuk setiap layanan
	}

	public function get_id_pelanggan() {
		$this->db->select('RIGHT(id_pelanggan,3) as kode', FALSE);
		$this->db->order_by('id_pelanggan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pelanggan');
	
		if($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}
	
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = "PLG".$kodemax; // PLG001, PLG002, dst
		
		return $kodejadi;
	}

}
