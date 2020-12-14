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
        $data['surat'] = $this->m_cuti->tampil_bupati();
        $this->load->view('templates_bupati/header.php');
        $this->load->view('templates_bupati/sidebar.php', $data);
        $this->load->view('bupati/content_dataBuatCuti.php', $data);
        $this->load->view('templates_bupati/footer.php');
    }


    public function tampil_buatsurat()
    {
        $data['sekda'] = $this->m_cuti->datasekda();
        $data['kepala'] = $this->m_cuti->dataKepalaDinas();
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['surat'] = $this->m_cuti->tampilBuatCutibupati();
        $this->load->view('templates_bupati/header.php');
        $this->load->view('templates_bupati/sidebar.php', $data);
        $this->load->view('bupati/content_buatCuti.php', $data);
        $this->load->view('templates_bupati/footer.php');
    }

    public function buatsurat()
    {
        $id = $this->input->post('id_surat');
        $data = array(
            'status' => '4'
        );
        $where = array('id_surat' => $id);
        $this->m_cuti->update_data($where, $data, 'surat');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Surat cuti berhasil di buat!!
        </div>');
        redirect('bupati/content_cuti');
    }

    public function detailCuti($id)
    {
        $data['sekda'] = $this->m_cuti->datasekda();
        $data['tampil'] = $this->m_user->tampil_profil();
        $detail = $this->m_cuti->detail_data($id);
        $dKepala = $this->m_cuti->dataKepalaDinas();
        $data['dkepala'] = $dKepala;
        $data['surat'] = $detail;
        $this->load->view('templates_bupati/header');
        $this->load->view('templates_bupati/sidebar', $data);
        $this->load->view('bupati/content_buatCuti', $data);
        $this->load->view('templates_bupati/footer');
    }
}
