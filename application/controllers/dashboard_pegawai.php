<?php
class Dashboard_pegawai extends CI_Controller
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
        $data['banyakk'] = $this->m_cuti->banyakCutipegawai();
        $data['banyak'] = $this->m_permohonan->banyakPermohonanpegawai();
        $this->load->view('templates_pegawai/header.php');
        $this->load->view('templates_pegawai/sidebar.php', $data);
        $this->load->view('pegawai/dashboard.php', $data);
        $this->load->view('templates_pegawai/footer.php');
    }
}
