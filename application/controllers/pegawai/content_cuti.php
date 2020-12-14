<?php

class Content_cuti extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_cuti');
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }
    public function index()
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['surat'] = $this->m_cuti->tampil_data_pegawai();
        $this->load->view('templates_pegawai/header.php');
        $this->load->view('templates_pegawai/sidebar.php', $data);
        $this->load->view('pegawai/content_cuti.php', $data);
        $this->load->view('templates_pegawai/footer.php');
    }

    public function detailCuti($id)
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $detail = $this->m_cuti->detail_data($id);
        $dKepala = $this->m_cuti->dataKepalaDinas();
        $data['dkepala'] = $dKepala;
        $data['detail'] = $detail;
        $data['sekda'] = $this->m_cuti->datasekda();
        $data['bupati'] = $this->m_cuti->databupati();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar', $data);
        $this->load->view('pegawai/content_detailCuti', $data);
        $this->load->view('templates_pegawai/footer');
    }
}
