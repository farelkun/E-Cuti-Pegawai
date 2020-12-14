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
        $data['surat'] = $this->m_permohonan->tampil_data();
        $this->load->view('templates_admin/header.php');
        $this->load->view('templates_admin/sidebar.php', $data);
        $this->load->view('admin/content_permohonan.php', $data);
        $this->load->view('templates_admin/footer.php');
    }

    public function approvement_permohonan()
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['surat'] = $this->m_permohonan->tampilapprovement();
        $this->load->view('templates_admin/header.php');
        $this->load->view('templates_admin/sidebar.php', $data);
        $this->load->view('admin/content_approvementPermohonan.php', $data);
        $this->load->view('templates_admin/footer.php');
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
            $data['tampil'] = $this->db->get('user');
            $data['user'] = $this->m_user->tampil_profil();
            $data['kodeunik'] = $this->m_permohonan->id_otomatis();
            $this->load->view('templates_admin/header.php');
            $this->load->view('templates_admin/sidebar.php', $data);
            $this->load->view('admin/content_buatPermohonan.php', $data);
            $this->load->view('templates_admin/footer.php');
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
            redirect('admin/content_permohonan/tambah');
        }
    }

    public function update_data()
    {
        $this->form_validation->set_rules('hal', 'Hal', 'required|trim', [
            'required'  => 'Hal tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kepada', 'Kepada', 'required|trim', [
            'required'  => 'Penerima surat tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $data['kepada'] = array(
                'Pegawai',
                'Kepegawaian Dispertahortbun',
                'Kepala Dinas',
                'BKPSDM',
                'Sekretaris Daerah',
                'Bupati'
            );
            $where = array('id_surat' => $this->input->post('id_surat'));
            $data['surat'] = $this->m_permohonan->edit_data($where, 'surat')->result();
            $data['tampil'] = $this->m_user->tampil_profil();
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/content_ubahPermohonan', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $id_surat = $this->input->post('id_surat');
            $hal = $this->input->post('hal');
            $deskripsi = $this->input->post('deskripsi');
            $kepada = $this->input->post('kepada');
            $tgl_cuti = $this->input->post('tanggal');
            $data = array(
                'hal'           => $hal,
                'deskripsi'     => $deskripsi,
                'kepada'        => $kepada,
                'tgl_cuti'      => $tgl_cuti
            );
            $where = array(
                'id_surat'      => $id_surat
            );

            $this->m_permohonan->update_data($where, $data, 'surat');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Surat permohonan cuti berhasil diubah!!
            </div>');
            redirect('admin/content_permohonan');
        }
    }

    public function edit($id)
    {
        $data['kepada'] = array(
            'Pegawai',
            'Kepegawaian',
            'Kepala Dinas',
            'BKPSDM',
            'Sekretaris Daerah',
            'Bupati'
        );
        $where = array('id_surat' => $id);
        $data['surat'] = $this->m_user->edit_data($where, 'surat')->result();
        $data['tampil'] = $this->m_user->tampil_profil();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/content_ubahPermohonan', $data);
        $this->load->view('templates_admin/footer');
    }

    function get_user()
    {
        $id = $this->input->post('id_user');
        $data = $this->m_permohonan->get_user($id);
        echo json_encode($data);
    }

    public function detailPermohonan($id)
    {
        $detail = $this->m_permohonan->detail_data($id);
        $data['detail'] = $detail;
        $data['tampil'] = $this->m_user->tampil_profil();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/content_detailPermohonan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function delete_data($id)
    {
        $where = array('id_surat' => $id);
        $this->m_permohonan->delete_data($where, 'surat');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data berhasil dihapus!!
        </div>');
        redirect('admin/content_permohonan');
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
        redirect('admin/content_permohonan/approvement_permohonan');
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
        redirect('admin/content_permohonan/approvement_permohonan');
    }
}
