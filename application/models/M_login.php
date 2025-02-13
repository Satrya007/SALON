<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    
    // Fungsi untuk login admin
    public function auth($username, $password) {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);
        return $this->db->get();
    }

    // Fungsi untuk login pelanggan
    public function auth_pelanggan($username, $password) {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);
        return $this->db->get();
    }

    // Fungsi untuk cek username pelanggan
    public function cek_username($username) {
        return $this->db->get_where('pelanggan', ['username' => $username])->row();
    }

    // Fungsi untuk update password pelanggan
    public function update_password($username, $new_password) {
        return $this->db->update('pelanggan', 
            ['password' => md5($new_password)], 
            ['username' => $username]
        );
    }

    // Fungsi sederhana untuk reset password pelanggan
    public function reset_password($username, $new_password) {
        $user = $this->db->get_where('pelanggan', ['username' => $username])->row();
        if($user) {
            return $this->db->update('pelanggan', 
                ['password' => md5($new_password)],
                ['username' => $username]
            );
        }
        return false;
    }
}