<?php
class Dashboard_admin extends CI_Controller
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
        $data['banyak'] = $this->db->count_all('user');
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['cuti'] = $this->m_cuti->banyakCuti();
        $data['permohonan'] = $this->m_permohonan->banyakPermohonan();
        $this->load->view('templates_admin/header.php');
        $this->load->view('templates_admin/sidebar.php', $data);
        $this->load->view('admin/dashboard.php', $data);
        $this->load->view('templates_admin/footer.php');
    }
}
