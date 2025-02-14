<?php

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $role = $this->session->userdata('role');
        if ($role <> 1) {
            echo "<script>alert('Anda belum login');window.location.href='" . site_url('site') . "';</script>";
            exit;
        }
    }

    public function index()
    {
        $data = array(
            'judul' => 'Welcome',
            'dt_gallery' => $this->m_umum->get_gallery(),
            'dt_service' => $this->m_umum->get_service_site(),
            'dt_kategori' => $this->m_umum->get_kategori(),
            'dt_testimoni' => $this->m_umum->get_testimoni()



        );
        $this->template->load('user/template2', 'user/home', $data);
    }
    public function about()
    {
        $data = array(
            'judul' => 'Tentang Kami',



        );
        $this->template->load('user/template', 'user/about', $data);
    }
    public function service()
    {
        $data = array(
            'judul' => 'Layanan Kami',
            'dt_service' => $this->m_umum->get_service(),


        );
        $this->template->load('user/template', 'user/service', $data);
    }
    public function gallery()
    {
        $data = array(
            'judul' => 'Gallery Kami',
            'dt_gallery' => $this->m_umum->get_gallery_all(),


        );
        $this->template->load('user/template', 'user/gallery', $data);
    }
    public function pesanan()
    {
        // Ambil data pesanan lengkap beserta servisnya
        $pesanan_data = $this->m_umum->get_pesanan_saya();

        // Debug: Periksa apakah data pesanan ada
        if (empty($pesanan_data)) {
            echo "<script>alert('Tidak ada pesanan untuk ditampilkan.');window.location.href='" . base_url('user') . "';</script>";
        } else {
            // Pastikan setiap item dalam pesanan memiliki properti yang diperlukan
            foreach ($pesanan_data as &$pesanan) {
                if (!isset($pesanan->biaya)) {
                    $pesanan->biaya = 0; // atau nilai default yang sesuai
                }
            }
        }

        $data = array(
            'judul' => 'Pesanan Saya',
            'dt_pesanan' => $pesanan_data,
        );

        $this->template->load('user/template', 'user/pesanan', $data);
    }

    function delete_transaksi($id)
    {

        $this->m_umum->hapus('transaksi', 'id_transaksi', $id);
        echo "<script>alert('Data Berhasil dihapuskan');window.location.href='" . base_url('user/pesanan') . "';</script>";
    }
    public function uploadFile()
    {
        $config['encrypt_name'] = TRUE;
        $config['upload_path'] = 'upload';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
        $config['overwrite'] = false;
        $config['max_size'] = 3000;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('bukti')) {
            return $this->upload->data("file_name");
        }
        $error = $this->upload->display_errors();
        echo "<script>alert('" . $error . "');window.location.href='" . base_url('user/pesanan') . "';</script>";
        exit;
    }
    function bayar()
    {
        $id_transaksi = $this->input->post('id_transaksi');

        $file = $this->uploadFile();

        $data_update = array(
            'bukti' => $file
        );
        $where = array('id_transaksi' => $id_transaksi);
        $res = $this->m_umum->UpdateData('transaksi', $data_update, $where);
        echo "<script>alert('Bukti Pembayaran berhasil di upload');window.location.href='" . base_url('user/pesanan') . "';</script>";
    }
    function kirim_testimoni()
    {

        $this->db->set('id_testimoni', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_testimoni', 'nama_testimoni', 'required');
        if ($this->form_validation->run() === FALSE)
            echo "<script>alert('Harap isi nama dan testimoni.');window.location.href='" . base_url('user') . "';</script>";
        else {

            $this->m_umum->set_data("testimoni");
            echo "<script>alert('Data Berhasil dikirim');window.location.href='" . base_url('user') . "';</script>";
        }
    }

    public function booking()
    {
        if (!$this->session->userdata('id_pelanggan')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu untuk melakukan pemesanan.');  
        }
        $tgl_booking = $this->input->post('tgl_booking');
        $jam_booking = $this->input->post('jam');
        $id_service = $this->input->post('id_service'); // Pastikan ID service ada
    
        // Mendapatkan data servis untuk nama servis, durasi, dan biaya
        $service = $this->m_umum->ambil_data('service', 'id_service', $id_service);
        $nama_service = $service->nama_service;
        $durasi = $service->durasi;
        $harga = $service->biaya; // Pastikan kolom di database bernama 'biaya'
    
        // Lakukan validasi dan proses booking seperti biasa
        $kode_unik = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        $tgl = date('d');
        $bln = date('m');
        $thn = date('Y');
        $hariini = date('Y-m-d');
        $menitdetik = date('is');
    
        $no_transaksi = 'BS' . $tgl . $jam_booking . $kode_unik . $thn . $menitdetik . $bln;

        // Validasi form input
        $this->form_validation->set_rules('tgl_booking', 'Tanggal Booking', 'required');
        $this->form_validation->set_rules('jam', 'Jam Booking', 'required');
        $this->form_validation->set_rules('id_service', 'ID Service', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            echo "<script>alert('Harap isi semua data booking.');window.location.href='" . base_url('user/service') . "';</script>";
        }

        // Periksa ketersediaan slot
        $slot_tersedia = $this->m_umum->check_slot($tgl_booking, $jam_booking, $id_service);
        if (!$slot_tersedia) {
            echo "<script>alert('Slot sudah penuh. Silakan pilih jam lain.');window.location.href='" . base_url('user/service') . "';</script>";
        }

        // Proses penyimpanan booking
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $data = [
            'id_transaksi' => uniqid(),
            'no_transaksi' => $no_transaksi,
            'id_pelanggan' => $id_pelanggan,
            'id_service' => $id_service,
            'tgl_transaksi' => $hariini,
            'tgl_booking' => $tgl_booking,
            'jam' => $jam_booking,
            'harga' => $harga, // Tambahkan ini
            'status' => 'Pending'
        ];

        // Gunakan transaksi database
        $this->db->trans_start();
        $this->db->insert('transaksi', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            echo "<script>alert('Gagal menyimpan booking. Silakan coba lagi.');window.location.href='" . base_url('user/service') . "';</script>";
        }

        // Berikan notifikasi keberhasilan
        echo "<script>alert('Booking berhasil! Silakan tunggu konfirmasi dari admin.');window.location.href='" . base_url('user/pesanan') . "';</script>";
    }
    public function check_slot()
    {
        if ($this->input->is_ajax_request()) {
            $tanggal = $this->input->post('tanggal');
            $jam = $this->input->post('jam');
            $id_service = $this->input->post('id_service');
            // var_dump($tanggal);
            $detail = $this->m_umum->get_booking_slot($tanggal, $jam, $id_service);
            $data = array();
            if ($jam == '17') {
                if ($detail->num_rows() >= 2) {
                    $tersedia = false;
                    $batas_slot = 2;
                    $slot_tersedia = 0;
                    $keterangan = 'Slot sudah  penuh';
                } else {
                    $tersedia = true;
                    $batas_slot = 2;
                    $slot_tersedia = 2 - $detail->num_rows();
                    $keterangan = 'Slot tersedia. sisa slot ' . $slot_tersedia;
                }
            } else {
                if ($detail->num_rows() >= 3) {
                    $tersedia = false;
                    $batas_slot = 3;
                    $slot_tersedia = 0;
                    $keterangan = 'Slot sudah  penuh';
                } else {
                    $batas_slot = 3;
                    $tersedia = true;
                    $slot_tersedia = 3 - $detail->num_rows();
                    $keterangan = 'Slot tersedia. sisa slot ' . $slot_tersedia;
                }
            }
            $data = array(
                'tersedia' => $tersedia,
                'batas_slot' => $batas_slot,
                'slot_tersedia' => $slot_tersedia,
                'keterangan' => $keterangan,
            );

            echo json_encode($data);
        } else {
            show_404(); // Tampilkan error 404 jika bukan permintaan AJAX
        }
    }
}

