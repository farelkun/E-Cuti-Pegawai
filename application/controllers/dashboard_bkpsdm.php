<?php
class Dashboard_bkpsdm extends CI_Controller
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
        $data['banyakk'] = $this->m_cuti->banyakCutbkpsdm();
        $data['tampil'] = $this->m_user->tampil_profil();
        $this->load->view('templates_bkpsdm/header.php');
        $this->load->view('templates_bkpsdm/sidebar.php', $data);
        $this->load->view('bkpsdm/dashboard.php');
        $this->load->view('templates_bkpsdm/footer.php');
    }
}
