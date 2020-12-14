<?php
class Dashboard_bupati extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_cuti');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['banyakk'] = $this->m_cuti->banyakCutibupati();
        $this->load->view('templates_bupati/header.php');
        $this->load->view('templates_bupati/sidebar.php', $data);
        $this->load->view('bupati/dashboard.php');
        $this->load->view('templates_bupati/footer.php');
    }
}
