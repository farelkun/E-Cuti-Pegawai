<?php defined('BASEPATH') or exit('No direct script access allowed');

class Content_user extends CI_Controller
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
        $data['user'] = $this->m_user->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/content_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('id_user', 'Id_user', 'required|trim', [
            'required'  => 'Id user tidak boleh kosong'
        ]);
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
        $this->form_validation->set_rules('ttd', 'TTD Basah', 'trim|xss_clean', [
            'required'  => 'Ttd basah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('level', 'Hak Akses', 'required|trim', [
            'required'  => 'Level tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required'  => 'Username tidak boleh kosong',
            'is_unique'  => 'Username sudah terpakai'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'required'  => 'Password tidak boleh kosong',
            'min_length'  => 'Password terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $data['tampil'] = $this->m_user->tampil_profil();
            $data['kodeunik'] = $this->m_user->id_otomatis();
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/content_insertUser', $data);
            $this->load->view('templates_admin/footer');
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
            $no_hp = $this->input->post('no_telp');
            $upload_image = $_FILES['ttd']['name'];
            if ($upload_image) {
                $config['upload_path']      = './assets/production/images';
                $config['allowed_types']    = 'jpeg|png|jpg';
                $config['max_size']             = 3000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
                $this->upload->do_upload('ttd');
            }

            $level = $this->input->post('level');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = array(
                'id_user'               => $id_user,
                'nip'                   => $nip,
                'nama'                  => $nama,
                'pangkat_golongan'      => $pangkat,
                'jabatan'               => $jabatan,
                'id_unitkerja'          => $unit_kerja,
                'tgl_lahir'             => $tgl_lahir,
                'jenkel'                => $jenkel,
                'alamat'                => $alamat,
                'no_hp'                 => $no_hp,
                'ttd_basah'             => $upload_image,
                'level'                 => $level,
                'username'              => $username,
                'password'              => $password
            );

            $this->m_user->input_data($data, 'user');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Data berhasil ditambahkan!!
            </div>');
            redirect('admin/content_user/tambah');
        }
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
        $this->form_validation->set_rules('ttd', 'TTD Basah', 'trim|xss_clean', [
            'required'  => 'Ttd basah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('level', 'Hak Akses', 'required|trim', [
            'required'  => 'Level tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_username_check', [
            'required'  => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'required'  => 'Password tidak boleh kosong',
            'min_length'  => 'Password terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $data['level'] = array(
                'Pegawai',
                'Kepegawaian',
                'Kepala Dinas',
                'BKPSDM',
                'Sekretaris Daerah',
                'Bupati'
            );
            $data['pria'] = "Pria";
            $data['wanita'] = "Wanita";
            $data['tampil'] = $this->m_user->tampil_profil();
            $where = array('id_user' => $this->input->post('id_user'));
            $data['user'] = $this->m_user->edit_data($where, 'user')->result();
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/content_ubahUser', $data);
            $this->load->view('templates_admin/footer');
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
            $level = $this->input->post('level');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $upload_image = $_FILES['ttd']['name'];
            if ($upload_image) {
                $config['upload_path']      = './assets/production/images';
                $config['allowed_types']    = 'jpeg|png|jpg';
                $config['max_size']             = 3000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('ttd')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('ttd_basah', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
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
                'level'                 => $level,
                'username'              => $username,
                'password'              => $password
            );
            $where = array(
                'id_user'    => $id_user
            );
            $this->m_user->update_data($where, $data, 'user');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data berhasil diupdate!!
        </div>');
            redirect('admin/content_user');
        }
    }

    public function edit($id)
    {
        $data['level'] = array(
            'Pegawai',
            'Kepegawaian',
            'Kepala Dinas',
            'BKPSDM',
            'Sekretaris Daerah',
            'Bupati'
        );
        $data['pria'] = "Pria";
        $data['wanita'] = "Wanita";
        $where = array('id_user' => $id);
        $data['tampil'] = $this->m_user->tampil_profil();
        $data['user'] = $this->m_user->edit_data($where, 'user')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/content_ubahUser', $data);
        $this->load->view('templates_admin/footer');
    }

    public function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai silahkan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function detail($id)
    {
        $this->load->model('m_user');
        $detail = $this->m_user->detail_data($id);
        $data['detail'] = $detail;
        $data['tampil'] = $this->m_user->tampil_profil();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/content_detail', $data);
        $this->load->view('templates_admin/footer');
    }

    public function delete_data($id)
    {
        $where = array('id_user' => $id);
        $this->m_user->delete_data($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data berhasil dihapus!!
        </div>');
        redirect('content_user');
    }

    public function print_data()
    {
        $data['user'] = $this->m_user->tampil_data("user")->result();
        $this->load->view('admin/print_user', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['user'] = $this->m_user->tampil_data('user')->result();

        $this->load->view('admin/laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_user.pdf", array('Attachment' => 0));
    }
}
