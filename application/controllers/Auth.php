<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth_m');
    }
    public function index()
    {
        is_logged_in();

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'viewContent' => 'login/index',
                'judul' => 'Login'
            ];
            $this->load->view('login/layout/wrapperAuth', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $cekUser = $this->db->get_where('auth', ['username' => $username])->row_array();
            if ($cekUser) {
                if (password_verify($password, $cekUser['password'])) {
                    $setSession = [
                        'id' => $cekUser['id'],
                        'email' => $cekUser['email'],
                        'username' => $cekUser['username'],
                        'role_id' => $cekUser['role_id'],
                    ];
                    $this->session->set_userdata($setSession);
                    if ($cekUser['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                }
            }
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth');
        }
    }
    public function logout()
    {
        $data = ['id', 'email', 'username', 'role_id'];
        $this->session->unset_userdata($data);
        $this->session->set_flashdata('success', 'Anda berhasil keluar.');
        redirect('auth');
    }
    public function registrasi()
    {
        is_logged_in();

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[auth.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[rpassword]');
        $this->form_validation->set_rules('rpassword', 'Password', 'required|trim|min_length[6]|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'viewContent' => 'login/registrasi',
                'judul' => 'Registrasi'
            ];
            $this->load->view('login/layout/wrapperAuth', $data);
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];
            $this->auth_m->insertUser($data);
            $this->session->set_flashdata('success', 'Akun berhasil dibuat. Silahkan login.');
            redirect('auth');
        }
    }
}
