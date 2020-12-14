<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content_ubahPassword extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }
    public function index()
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $this->load->view('templates_kepalaDinas/header.php');
        $this->load->view('templates_kepalaDinas/sidebar.php', $data);
        $this->load->view('kepalaDinas/content_ubahPassword.php');
        $this->load->view('templates_kepalaDinas/footer.php');
    }

    public function update()
    {
        $this->form_validation->set_rules('pwlama', 'Password lama', 'required|trim', [
            'required'  => 'Password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('pwbaru', 'Password baru', 'required|trim|min_length[6]', [
            'required'    => 'Password tidak boleh kosong',
            'min_length'  => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('pwbaru2', 'Konfirmasi password baru', 'required|trim|min_length[6]|matches[pwbaru]', [
            'required'  => 'Password tidak boleh kosong',
            'min_length'  => 'Password terlalu pendek',
            'matches'     => 'Password baru tidak cocok'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_kepalaDinas/header.php');
            $this->load->view('templates_kepalaDinas/sidebar.php');
            $this->load->view('kepalaDinas/content_ubahPassword.php');
            $this->load->view('templates_kepalaDinas/footer.php');
        } else {
            $cek_old = $this->m_user->cek_old();
            if ($cek_old == FALSE) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Password lama salah!!</div>');
                redirect('kepalaDinas/content_ubahPassword');
            } else {
                $this->m_user->save();
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Password berhasil di ubah!!
            </div>');
                redirect('kepalaDinas/content_ubahPassword');
            }
        }
    }
}
