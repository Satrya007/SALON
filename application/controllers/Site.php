<?php

class Site extends CI_Controller{
  function __construct()
    {
        parent::__construct();
      
        $this->load->model('m_umum');
    }

 
    public function index()
    {
  $data = array(
           'judul' => 'Booking Salon Online',
          'dt_gallery' => $this->m_umum->get_gallery(),
          'dt_service' => $this->m_umum->get_service_site(),
          'dt_kategori' => $this->m_umum->get_kategori(),
          'dt_testimoni' => $this->m_umum->get_testimoni()
          
           
        );
        $this->template->load('site/template', 'site/home', $data);
    }
    function simpan_kontak()
    {

        $this->db->set('id_kontak', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama', 'nama', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/kontak');
        else {

            $this->m_umum->set_data("kontak");
            $notif = "Data Berhasil dikirim";
            $this->session->set_flashdata('success', $notif);
            redirect('site');
        }
    }
    public function register() {
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[pelanggan.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo "<script>
                alert('Data register tidak lengkap atau username sudah digunakan!');
                window.location.href='".base_url('site')."';
            </script>";
        } else {
            $data = array(
                'id_pelanggan' => $this->m_umum->get_id_pelanggan(),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => 1
            );
            
            $this->m_umum->input_data($data, 'pelanggan');
            echo "<script>
                alert('Register berhasil! Silahkan login.');
                window.location.href='".base_url('site')."';
            </script>";
        }
    }
     public function about()
    {
  $data = array(
           'judul' => 'Tentang Kami',
         
          
           
        );
        $this->template->load('site/template2', 'site/about', $data);
    }
     public function service()
    {
  $data = array(
           'judul' => 'Layanan Kami',
         'dt_service' => $this->m_umum->get_service(),
          
           
        );
        $this->template->load('site/template2', 'site/service', $data);
    }
     public function gallery()
    {
  $data = array(
           'judul' => 'Gallery Kami',
          'dt_gallery' => $this->m_umum->get_gallery_all(),
          
           
        );
        $this->template->load('site/template2', 'site/gallery', $data);
    }

}

