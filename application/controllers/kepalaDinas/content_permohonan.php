<?php
class Content_permohonan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_permohonan');
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['surat'] = $this->m_permohonan->tampilapprovement();
        $this->load->view('templates_kepalaDinas/header.php');
        $this->load->view('templates_kepalaDinas/sidebar.php', $data);
        $this->load->view('kepalaDinas/content_approvementPermohonan.php', $data);
        $this->load->view('templates_kepalaDinas/footer.php');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('hal', 'Hal', 'required|trim', [
            'required'  => 'Hal tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kepada', 'Kepada', 'required|trim', [
            'required'  => 'Penerima surat tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $data['tampil'] = $this->m_user->tampil_profil();
            $data['surat'] = $this->db->get('user');
            $data['kodeunik'] = $this->m_permohonan->id_otomatis();
            $this->load->view('templates_pegawai/header.php');
            $this->load->view('templates_pegawai/sidebar.php');
            $this->load->view('pegawai/content_buatPermohonan.php', $data);
            $this->load->view('templates_pegawai/footer.php');
        } else {
            $id_surat = $this->input->post('id_surat');
            $id_user = $this->input->post('id_user');
            $kantor = $this->input->post('kantor');
            $hal = $this->input->post('hal');
            $deskripsi = $this->input->post('deskripsi');
            $kepada = $this->input->post('kepada');
            $tgl_cuti = $this->input->post('tanggal');
            $data = array(
                'id_surat'      => $id_surat,
                'id_user'       => $id_user,
                'kantor'        => $kantor,
                'hal'           => $hal,
                'deskripsi'     => $deskripsi,
                'kepada'        => $kepada,
                'tgl_cuti'      => $tgl_cuti,
                'status'        => '1'
            );
            $this->m_permohonan->input_data($data, 'surat');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Surat permohonan cuti berhasil dikirim!!
            </div>');
            redirect('pegawai/content_permohonan');
        }
    }

    public function detailPermohonan($id)
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $detail = $this->m_permohonan->detail_data($id);
        $data['detail'] = $detail;
        $this->load->view('templates_kepalaDinas/header');
        $this->load->view('templates_kepalaDinas/sidebar', $data);
        $this->load->view('kepalaDinas/content_detailPermohonan', $data);
        $this->load->view('templates_kepalaDinas/footer');
    }

    public function tampilBuatPermohonan($id)
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['kodeunik'] = $this->m_permohonan->id_otomatis();
        $detail = $this->m_permohonan->detail_suratPegawai($id);
        $data['surat'] = $detail;
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar', $data);
        $this->load->view('pegawai/content_buatPermohonan.php', $data);
        $this->load->view('templates_pegawai/footer');
    }

    public function delete_data($id)
    {
        $where = array('id_surat' => $id);
        $this->m_permohonan->delete_data($where, 'surat');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data berhasil dihapus!!
        </div>');
        redirect('pegawai/content_permohonan');
    }

    public function setuju($id)
    {
        $data = array(
            'approvement' => 'Disetujui'
        );
        $where = array('id_surat' => $id);
        $this->m_permohonan->approvement($where, $data, 'surat');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Surat permohonan cuti disetujui!!
        </div>');
        redirect('kepalaDinas/content_permohonan');
    }

    public function nsetuju($id)
    {
        $data = array(
            'approvement' => 'Tidak disetujui'
        );
        $where = array('id_surat' => $id);
        $this->m_permohonan->approvement($where, $data, 'surat');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Surat permohonan cuti tidak disetujui!!
        </div>');
        redirect('kepalaDinas/content_permohonan');
    }
}
