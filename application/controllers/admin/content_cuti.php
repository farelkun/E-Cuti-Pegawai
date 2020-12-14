<?php

class Content_cuti extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_cuti');
        $this->load->model('m_permohonan');
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }
    public function index()
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['surat'] = $this->m_cuti->detailcutiall();
        $this->load->view('templates_admin/header.php');
        $this->load->view('templates_admin/sidebar.php', $data);
        $this->load->view('admin/content_cuti.php', $data);
        $this->load->view('templates_admin/footer.php');
    }

    public function banyakCuti()
    {
        $data['kodeunik'] = $this->m_cuti->id_otomatisCuti();
        $data['tampil'] = $this->m_user->tampil_profil();
        $this->load->view('templates_admin/header.php');
        $this->load->view('templates_admin/sidebar.php', $data);
        $this->load->view('admin/content_masterCuti.php', $data);
        $this->load->view('templates_admin/footer.php');
    }

    public function pakaiCuti()
    {
        $data['kodeunik'] = $this->m_cuti->id_otomatisCuti();
        $data['tampil'] = $this->m_user->tampil_profil();
        $this->load->view('templates_admin/header.php');
        $this->load->view('templates_admin/sidebar.php', $data);
        $this->load->view('admin/content_masterCutiPakai.php', $data);
        $this->load->view('templates_admin/footer.php');
    }

    public function buat_banyakcuti()
    {
        $id_cuti = $this->input->post('id_banyak');
        $data = array(
            'id_cuti'      => $id_cuti
        );
        $this->m_cuti->input_data($data, 'cuti');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Jumlah cuti berhasil dibuat!!
            </div>');
        redirect('admin/content_cuti/banyakCuti');
    }

    public function buat_pakaicuti()
    {
        $id_user = $this->input->post('id_user');
        $id_cuti = $this->input->post('id_banyak');
        $data = array(
            'id_cuti'      => $id_cuti
        );
        $where = array('id_user' => $id_user);
        $this->m_cuti->update_data($where, $data, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Jumlah cuti berhasil dipakai!!
            </div>');
        redirect('admin/content_cuti/pakaiCuti');
    }

    public function data_buatCuti()
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['surat'] = $this->m_cuti->tampilBuatCuti();
        $this->load->view('templates_admin/header.php');
        $this->load->view('templates_admin/sidebar.php', $data);
        $this->load->view('admin/content_dataBuatCuti.php', $data);
        $this->load->view('templates_admin/footer.php');
    }

    public function tampil_buatsurat($id)
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $where = array('id_surat' => $id);
        $this->db->join('user', 'user.id_user=surat.id_user');
        $data['surat'] = $this->m_user->edit_data($where, 'surat')->result();
        $this->load->view('templates_admin/header.php');
        $this->load->view('templates_admin/sidebar.php', $data);
        $this->load->view('admin/content_buatCuti.php', $data);
        $this->load->view('templates_admin/footer.php');
    }

    public function buatsurat()
    {
        $id = $this->input->post('id_surat');
        $data = array(
            'status' => '2'
        );
        $where = array('id_surat' => $id);
        $this->m_cuti->update_data($where, $data, 'surat');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Surat cuti tidak berhasil di buat!!
        </div>');
        redirect('admin/content_cuti/data_buatCuti');
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
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/content_detailCuti', $data);
        $this->load->view('templates_admin/footer');
    }

    public function print($id)
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $detail = $this->m_cuti->detail_data($id);
        $dKepala = $this->m_cuti->dataKepalaDinas();
        $data['dkepala'] = $dKepala;
        $data['detail'] = $detail;
        $data['sekda'] = $this->m_cuti->datasekda();
        $data['bupati'] = $this->m_cuti->databupati();
        $this->load->view('admin/print', $data);
    }

    public function delete_data($id)
    {
        $where = array('id_surat' => $id);
        $this->m_cuti->delete_data($where, 'surat');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Surat Cuti berhasil dihapus!!
        </div>');
        redirect('admin/content_cuti');
    }
}
