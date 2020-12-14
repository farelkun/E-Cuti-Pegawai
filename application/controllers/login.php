<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => "Username tidak boleh kosong!"
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => "Password tidak boleh kosong!"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('login.php');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();


        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'nama' => $user['nama'],
                    'ttd_basah' => $user['ttd_basah']
                ];
                $this->session->set_userdata($data);
                if ($user['level'] == 'Pegawai') {
                    redirect('dashboard_pegawai');
                } else if ($user['level'] == 'Kepegawaian Dispertahortbun') {
                    redirect('dashboard_admin');
                } else if ($user['level'] == 'Kepala Dinas') {
                    redirect('dashboard_kepalaDinas');
                } else if ($user['level'] == 'BKPSDM') {
                    redirect('dashboard_bkpsdm');
                } else if ($user['level'] == 'Sekretaris Daerah') {
                    redirect('dashboard_sekda');
                } else if ($user['level'] == 'Bupati') {
                    redirect('dashboard_bupati');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            Password Salah!
        </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            Username Salah!
        </div>');
            redirect('login');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
            Anda telah logged out!
        </div>');
        redirect('login');
    }
}
