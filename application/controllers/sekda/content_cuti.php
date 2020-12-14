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
        $data['surat'] = $this->m_cuti->tampil_data();
        $this->load->view('templates_sekda/header.php');
        $this->load->view('templates_sekda/sidebar.php', $data);
        $this->load->view('sekda/content_dataBuatCuti.php', $data);
        $this->load->view('templates_sekda/footer.php');
    }


    public function tampil_buatsurat()
    {
        // $where = array('id_surat' => $id, 'surat.status' => '1', 'surat.approvement' => 'Disetujui');
        // $this->db->join('user', 'user.id_user=surat.id_user');
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['surat'] = $this->m_cuti->tampilBuatCuti();
        $data['kepala'] = $this->m_cuti->dataKepalaDinas();
        $this->load->view('templates_sekda/header.php');
        $this->load->view('templates_sekda/sidebar.php', $data);
        $this->load->view('sekda/content_buatCuti.php', $data);
        $this->load->view('templates_sekda/footer.php');
    }

    public function buatsurat()
    {
        $id = $this->input->post('id_surat');
        $data = array(
            'status' => '3'
        );
        $where = array('id_surat' => $id);
        $this->m_cuti->update_data($where, $data, 'surat');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Surat cuti berhasil di buat!!
        </div>');
        redirect('sekda/content_cuti');
    }

    public function detailCuti($id)
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $detail = $this->m_cuti->detail_data($id);
        $dKepala = $this->m_cuti->dataKepalaDinas();
        $data['dkepala'] = $dKepala;
        $data['surat'] = $detail;
        $this->load->view('templates_sekda/header');
        $this->load->view('templates_sekda/sidebar', $data);
        $this->load->view('sekda/content_buatCuti', $data);
        $this->load->view('templates_sekda/footer');
    }
}
