<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH . 'libraries/RestController.php');
require(APPPATH . 'libraries/Format.php');

class Rest_user extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user', 'usr');
        $this->load->library('form_validation');
    }

    public function tampil_post()
    {
        $user = $this->db->get_where('user', ['username' => $this->input->post('username')])->row_array();

        if ($user) {
            $this->response([
                'data' => [$user]
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id_user');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->usr->deleteUser($id) > 0) {
                //ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted'
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not dound'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    public function insert_post()
    {
        if (!empty($_FILES['ttd_basah']['name'])) {
            $foto = $this->input->post('ttd_basah');
            $config['upload_path']      = './assets/production/images';
            $config['allowed_types']    = 'jpeg|png|jpg';
            $config['max_size']             = 3000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('ttd_basah')) {
                $foto = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_error();
            }
        }
        if (!empty($_FILES['foto_profil']['name'])) {
            $fotoprofil = $this->input->post('foto_profil');
            $config['upload_path']      = './assets/production/images';
            $config['allowed_types']    = 'jpeg|png|jpg';
            $config['max_size']             = 3000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('ttd_basah')) {
                $fotoprofil = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_error();
            }
        }
        $data = [
            'id_user'               => $this->post('id_user'),
            'nip'                   => $this->post('nip'),
            'nama'                  => $this->post('nama'),
            'pangkat_golongan'      => $this->post('pangkat_golongan'),
            'jabatan'               => $this->post('jabatan'),
            'unit_kerja'            => $this->post('unit_kerja'),
            'tgl_lahir'             => $this->post('tgl_lahir'),
            'jenkel'                => $this->post('jenkel'),
            'alamat'                => $this->post('alamat'),
            'no_hp'                 => $this->post('no_hp'),
            'ttd_basah'             => $foto,
            'level'                 => $this->post('level'),
            'username'              => $this->post('username'),
            'password'              => $this->post('password'),
            'foto_profil'           => $fotoprofil
        ];

        if ($this->usr->createUser($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new user has been created.'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new data!'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function login_post()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => "Username tidak boleh kosong!",
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => "Password tidak boleh kosong!"
        ]);

        if ($this->form_validation->run() == false) {
            $this->response([
                'status' => false,
                'errors' => [
                    'username' => [$this->stripHTMLtags(form_error('username'))],
                    'password' => [$this->stripHTMLtags(form_error('password'))]
                ]
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($user) {
                if ($password == $user['password']) {
                    $data = [
                        'username' => $user['username'],
                        'level' => $user['level'],
                        'nama' => $user['nama'],
                        'ttd_basah' => $user['ttd_basah']
                    ];
                    $this->session->set_userdata($data);
                    $this->response($user, RestController::HTTP_OK);
                } else {
                    $this->response([
                        'status' => false,
                    ], RestController::HTTP_UNAUTHORIZED);
                }
            } else {
                $this->response([
                    'status' => false,
                ], RestController::HTTP_UNAUTHORIZED);
            }
        }
    }

    public function stripHTMLtags($str)
    {
        $t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
        $t = htmlentities($t, ENT_QUOTES, "UTF-8");
        return $t;
    }

    public function updateprofil_put()
    {
        $id = $this->put('id_user');
        $data = [
            'nip'                   => $this->put('nip'),
            'nama'                  => $this->put('nama'),
            'pangkat_golongan'      => $this->put('pangkat_golongan'),
            'jabatan'               => $this->put('jabatan'),
            'alamat'                => $this->put('alamat'),
            'no_hp'                 => $this->put('no_hp'),
        ];

        if ($this->usr->updateUser($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'user has been updated.'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function ubahpassword_put()
    {
        $this->db->select('*');
        $cek_old = $this->db->get_where('user', array('id_user' =>  $this->put('pwlama')));


        $id = $this->put('id_user');
        $data = array(
            'password' => $this->put('pwbaru')
        );

        $this->response([
            'status' => false,
            'message' => 'password gagal diubah',
            'data'  => $cek_old
        ], RestController::HTTP_BAD_REQUEST);

        // if ($cek_old == FALSE) {
        //     $this->response([
        //         'status' => false,
        //         'message' => 'password gagal diubah'
        //     ], RestController::HTTP_BAD_REQUEST);
        // } else {
        //     if ($this->usr->updateUser($data, $id) > 0) {
        //         $this->response([
        //             'status' => true,
        //             'message' => 'pasword berhasil diubah'
        //         ], RestController::HTTP_OK);
        //     } else {
        //         $this->response([
        //             'status' => false,
        //             'message' => 'gagal ubah password',
        //             'data' => $cek_old
        //         ], RestController::HTTP_BAD_REQUEST);
        //     }
        // }
    }
}
