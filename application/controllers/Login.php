<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
    public function index()
    {
        $role = $this->session->userdata('role');
        if ($role == 1) {
            redirect(site_url('user'));
        } else if ($role == 2) {
            redirect(site_url('admin'));
        } else {
            redirect('site');
        }
    }

    public function auth_action()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $cek_login = $this->m_login->auth($username, $password);
        $cek_user = $this->m_login->auth_pelanggan($username, $password);

        if (!$cek_login->num_rows() && !$cek_user->num_rows()) {
            $this->session->set_flashdata('message', 'Username atau Password Salah!');
            redirect('site');
        }

        // Cek login admin
        if ($cek_login->num_rows() > 0) {
            $data = $cek_login->row();
            if ($data->role == 2) {
                $this->session->set_userdata('role', $data->role);
                redirect('admin');
            } else {
                $this->session->set_flashdata('error', 'Gagal login sebagai admin');
                redirect('site');
            }
        }

        // Cek login pelanggan
        if ($cek_user->num_rows() > 0) {
            $data_user = $cek_user->row();
            if ($data_user->role == 1) {
                $this->session->set_userdata([
                    'role' => $data_user->role,
                    'id_pelanggan' => $data_user->id_pelanggan,
                    'nama' => $data_user->nama_pelanggan
                ]);
                redirect('user');
            }
        }

        // Jika tidak ada yang cocok
        $this->session->set_flashdata('error', 'Username atau Password Salah');
        redirect('site');
    }

    public function forgot_password() {
        $username = $this->input->post('username');
        $new_password = $this->input->post('new_password');
        
        if(empty($username) || empty($new_password)) {
            $this->session->set_flashdata('message', 'Username dan Password baru harus diisi!');
            redirect('site');
            return;
        }

        if($this->m_login->reset_password($username, $new_password)) {
            $this->session->set_flashdata('message', 'Password berhasil diubah!');
        } else {
            $this->session->set_flashdata('message', 'Username tidak ditemukan!');
        }
        
        redirect('site');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('site');
    }
}