<?php
class Dashboard_kepalaDinas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_cuti');
        $this->load->model('m_permohonan');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['banyakk'] = $this->m_cuti->banyakCutiKepalaDinas();
        $data['banyak'] = $this->m_permohonan->banyakPermohonanKepalaDinas();
        $this->load->view('templates_kepalaDinas/header.php');
        $this->load->view('templates_kepalaDinas/sidebar.php', $data);
        $this->load->view('kepalaDinas/dashboard.php', $data);
        $this->load->view('templates_kepalaDinas/footer.php');
    }
}
