<?php

class Content_profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }
    public function index()
    {
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['detail'] = $this->m_user->detail_data();
        $this->load->view('templates_kepalaDinas/header.php');
        $this->load->view('templates_kepalaDinas/sidebar.php', $data);
        $this->load->view('kepalaDinas/content_profil.php', $data);
        $this->load->view('templates_kepalaDinas/footer.php');
    }

    public function update_data()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required'  => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nip', 'Nip', 'required|trim', [
            'required'  => 'NIP tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required|trim', [
            'required'  => 'Pangkat tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
            'required'  => 'Jabatan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'required|trim', [
            'required'  => 'Unit kerja tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
            'required'  => 'Tanggal lahir tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim', [
            'required'  => 'Jenis kelamin tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required'  => 'Alamat tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim');
        $this->form_validation->set_rules('ttd', 'TTD Basah', 'xss_clean', [
            'required'  => 'Ttd basah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('foto_profil', 'Foto Profil', 'xss_clean', [
            'required'  => 'Foto profil tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $data['pria'] = "Pria";
            $data['wanita'] = "Wanita";
            $data['tampil'] = $this->m_user->tampil_profil();
            $where = array('id_user' => $this->input->post('id_user'));
            $data['user'] = $this->m_user->edit_data($where, 'user')->result();
            $this->load->view('templates_kepalaDinas/header');
            $this->load->view('templates_kepalaDinas/sidebar', $data);
            $this->load->view('kepalaDinas/content_ubahUser', $data);
            $this->load->view('templates_kepalaDinas/footer');
        } else {
            $id_user = $this->input->post('id_user');
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $pangkat = $this->input->post('pangkat');
            $jabatan = $this->input->post('jabatan');
            $unit_kerja = $this->input->post('unit_kerja');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $jenkel = $this->input->post('gender');
            $alamat = $this->input->post('alamat');
            $upload_image = $_FILES['ttd']['name'];
            if ($upload_image) {
                $config['upload_path']      = './assets/production/images';
                $config['allowed_types']    = 'jpeg|png|jpg';
                $config['max_size']             = 3000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('ttd')) {
                    $image_lama = $data['user']['ttd'];
                    if ($image_lama != $data['user']['ttd']) {
                        unlink(FCPATH . 'assets/production/images' . $image_lama);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('ttd_basah', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $upload_image = $this->input->post('oldttd');
            }
            $profil = $_FILES['foto_profil']['name'];
            if ($profil) {
                $config['upload_path']      = './assets/production/images';
                $config['allowed_types']    = 'jpeg|png|jpg';
                $config['max_size']             = 3000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_profil')) {
                    $image_lama = $data['user']['foto_profil'];
                    if ($image_lama != $data['user']['foto_profil']) {
                        unlink(FCPATH . 'assets/production/images' . $image_lama);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_profil', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $profil = $this->input->post('oldprofil');
            }
            $data = array(
                'nip'                   => $nip,
                'nama'                  => $nama,
                'pangkat_golongan'      => $pangkat,
                'jabatan'               => $jabatan,
                'unit_kerja'            => $unit_kerja,
                'tgl_lahir'             => $tgl_lahir,
                'jenkel'                => $jenkel,
                'alamat'                => $alamat,
                'ttd_basah'             => $upload_image,
                'foto_profil'           => $profil
            );
            $where = array(
                'id_user'    => $id_user
            );
            $this->m_user->update_data($where, $data, 'user');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data berhasil diupdate!!
        </div>');
            redirect('kepalaDinas/content_profil');
        }
    }

    public function edit($id)
    {
        $data['pria'] = "Pria";
        $data['wanita'] = "Wanita";
        $where = array('id_user' => $id);
        $data['user'] = $this->m_user->edit_data($where, 'user')->result();
        $data['tampil'] = $this->m_user->tampil_profil();
        $this->load->view('templates_kepalaDinas/header');
        $this->load->view('templates_kepalaDinas/sidebar', $data);
        $this->load->view('kepalaDinas/content_ubahUser', $data);
        $this->load->view('templates_kepalaDinas/footer');
    }
}
