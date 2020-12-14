<?php
class Dashboard_sekda extends CI_Controller
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
        $data['banyakk'] = $this->m_cuti->banyakCutisekda();
        $this->load->view('templates_sekda/header.php');
        $this->load->view('templates_sekda/sidebar.php', $data);
        $this->load->view('sekda/dashboard.php');
        $this->load->view('templates_sekda/footer.php');
    }
}
