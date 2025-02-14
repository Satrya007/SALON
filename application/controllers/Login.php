<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
    public function index() {
        // Simpan URL sebelumnya untuk redirect setelah login
        $this->session->set_userdata('redirect_after_login', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url());
        
        $role = $this->session->userdata('role');
        if ($role == 1) {
            redirect(site_url('user'));
        } else if ($role == 2) {
            redirect(site_url('admin'));
        }
        
        $data['judul'] = 'Login';
        $this->template->load('site/template2', 'site/login', $data);
    }

    public function auth_action() {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $cek_login = $this->m_login->auth($username, $password);
        $cek_user = $this->m_login->auth_pelanggan($username, $password);

        if (!$cek_login->num_rows() && !$cek_user->num_rows()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Username atau Password Salah!</div>');
            redirect('login');
            return;
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
                
                // Redirect ke halaman sebelumnya jika ada
                if($this->session->userdata('redirect_after_login')) {
                    $redirect = $this->session->userdata('redirect_after_login');
                    $this->session->unset_userdata('redirect_after_login');
                    redirect($redirect);
                    return;
                }
                
                redirect('user');
                return;
            }
        }

        // Cek login admin
        if ($cek_login->num_rows() > 0) {
            $data = $cek_login->row();
            if ($data->role == 2) {
                $this->session->set_userdata('role', $data->role);
                redirect('admin');
                return;
            }
        }

        $this->session->set_flashdata('error', '<div class="alert alert-danger">Username atau Password Salah</div>');
        redirect('login');
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