<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

require(APPPATH . 'libraries/RestController.php');
require(APPPATH . 'libraries/Format.php');

class Rest_surat extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_permohonan', 'srt');
        $this->load->model('m_cuti', 'cuti');
        $this->load->library('form_validation');
    }

    public function tampilsuratCuti_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('surat.status', '4');
        $this->db->where('surat.id_surat', $this->input->post('id_surat'));
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilPermohonanPegawai_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->where('user.username', $this->input->post('username'));
        $query = $this->db->get();


        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilbuatPermohonanPegawai_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('user.username', $this->input->post('username'));
        $query = $this->db->get();


        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilsuratPermohonanPegawai_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->where('surat.id_surat', $this->input->post('id_surat'));
        $query = $this->db->get();


        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilallPermohonanKepalaDinas_get()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('status', '1');
        $this->db->not_like('surat.approvement', 'Disetujui');
        $this->db->not_like('surat.approvement', 'Tidak disetujui');
        $query = $this->db->get();


        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilPermohonanKepalaDinas_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('status', '1');
        $this->db->where('unit_kerja.namaunit', $this->input->post('namaunit'));
        $this->db->not_like('surat.approvement', 'Disetujui');
        $this->db->not_like('surat.approvement', 'Tidak disetujui');
        $query = $this->db->get();


        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilsuratPermohonanKepalaDinas_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('status', '1');
        $this->db->where('surat.id_surat', $this->input->post('id_surat'));
        $this->db->not_like('surat.approvement', 'Disetujui');
        $this->db->not_like('surat.approvement', 'Tidak disetujui');
        $query = $this->db->get();


        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilallPermohonanBkpsdm_get()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $query = $this->db->get_where('surat', array('surat.status' => '1', 'surat.approvement' => 'Disetujui'));

        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilPermohonanBkpsdm_post()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $query = $this->db->get_where('surat', array('surat.status' => '2', 'surat.approvement' => 'Disetujui', 'unit_kerja.namaunit' => $this->input->post('namaunit')));

        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilsuratPermohonanBkpsdm_post()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $query = $this->db->get_where('surat', array('surat.status' => '1', 'surat.approvement' => 'Disetujui', 'surat.id_surat' => $this->input->post('id_surat')));

        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilallPermohonanSekda_get()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $query = $this->db->get_where('surat', array('surat.status' => '2', 'surat.approvement' => 'Disetujui'));

        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function Sekda_get()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $query = $this->db->get_where('surat', array('surat.status' => '2', 'surat.approvement' => 'Disetujui'));

        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilPermohonanSekda_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('surat.status', '2');
        $this->db->where('surat.approvement', 'Disetujui');
        $this->db->where('unit_kerja.namaunit', $this->input->post('namaunit'));
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilSuratPermohonanSekda_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('surat.status', '2');
        $this->db->where('surat.approvement', 'Disetujui');
        $this->db->where('surat.id_surat', $this->input->post('id_surat'));
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilallApproveBupati_get()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $query = $this->db->get_where('surat', array('surat.status' => '3', 'surat.approvement' => 'Disetujui'));

        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilApproveBupati_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('surat.status', '3');
        $this->db->where('surat.approvement', 'Disetujui');
        $this->db->where('unit_kerja.namaunit', $this->input->post('namaunit'));
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilSuratPermohonanBupati_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('surat.status', '3');
        $this->db->where('surat.approvement', 'Disetujui');
        $this->db->where('surat.id_surat', $this->input->post('id_surat'));
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilDataCutiPegawai_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->where('surat.status', '4');
        $this->db->where('user.username', $this->input->post('username'));
        $query = $this->db->get();


        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function tampilDataCutiKepala_post()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('surat.status', '4');
        $this->db->where('unit_kerja.namaunit', $this->input->post('namaunit'));
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }


    public function tampilallDataCutiKepala_get()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $this->db->where('surat.status', '4');
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            $this->response($query->result_array(), RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function deleteSurat_delete()
    {
        $id = $this->delete('id_surat');

        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->srt->deleteSurat($id) > 0) {
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

    public function permohonan_post()
    {
        $id_otomatis = $this->srt->id_otomatis();
        $data = [
            'id_surat'           =>  $id_otomatis,
            'id_user'            =>  $this->post('id_user'),
            'kantor'             =>  $this->post('kantor'),
            'deskripsi'          =>  $this->post('deskripsi'),
            'hal'                =>  $this->post('hal'),
            'kepada'             =>  $this->post('kepada'),
            'tgl_cuti'           =>  $this->post('tgl_cuti'),
            'status'             =>  '1',
            'approvement'        =>  '',
        ];

        if ($this->srt->createSurat($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new surat has been created.'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new surat!'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function insertPermohonan_post()
    {
        $this->db->select_sum('surat.banyak_cuti');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->where('user.username', $this->input->post('username'));
        $this->db->where('surat.tahun', date("Y"));
        $banyakcuti = $this->db->get('user')->result();
        $value = array_column($banyakcuti, 'banyak_cuti');
        $value1 = $value[0];
        $value2 = intval($value1);
        $id_otomatis = $this->srt->id_otomatis();
        $data = [
            'id_surat'           =>  $id_otomatis,
            'id_user'            =>  $this->post('id_user'),
            'kantor'             =>  'Dispertahortbun',
            'deskripsi'          =>  $this->post('deskripsi'),
            'hal'                =>  $this->post('hal'),
            'kepada'             =>  $this->post('kepada'),
            'tgl_cuti'           =>  $this->post('tgl_cuti'),
            'status'             =>  '1',
            'approvement'        =>  '',
            'banyak_cuti'        =>  $this->post('banyak_cuti'),
            'tahun'              => date("Y"),
        ];

        // $this->response([
        //     'status' => false,
        //     'message' => 'pembuatan surat melebihi batas',
        //     'data'  => $value2
        // ], RestController::HTTP_BAD_REQUEST);
        if ($value2 >= 12) {
            $this->response([
                'status' => false,
                'message' => 'pembuatan surat melebihi batas',
                'data'  => $value1
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->srt->createSurat($data) > 0) {
                $this->response([
                    'status' => true,
                    'data'     => $data,
                    'message' => 'new surat has been created.'
                ], RestController::HTTP_CREATED);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'failed to create new surat!'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    public function updateSurat_put()
    {
        $id = $this->put('id_surat');
        $data = [
            'id_user'            =>  $this->post('id_user'),
            'kantor'             =>  $this->post('kantor'),
            'deskripsi'          =>  $this->post('deskripsi'),
            'hal'                =>  $this->post('hal'),
            'kepada'             =>  $this->post('kepada'),
            'tgl_cuti'           =>  $this->post('tgl_cuti'),
            'status'             =>  $this->post('status'),
        ];

        if ($this->srt->updateSurat($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'surat has been updated.'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update surat!'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function updateSuratCuti_put()
    {
        $id = $this->put('id_surat');
        $data = [
            'status'             =>  '2',
        ];

        if ($this->srt->updateSurat($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'surat has been updated.'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update surat!'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function updateSuratCutisekda_put()
    {
        $id = $this->put('id_surat');
        $data = [
            'id_user'            =>  $this->post('id_user'),
            'kantor'             =>  $this->post('kantor'),
            'deskripsi'          =>  $this->post('deskripsi'),
            'hal'                =>  $this->post('hal'),
            'kepada'             =>  $this->post('kepada'),
            'tgl_cuti'           =>  $this->post('tgl_cuti'),
            'status'             =>  '3',
            'approvement'        =>  $this->post('approvement'),
        ];

        if ($this->srt->updateSurat($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'surat has been updated.'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update surat!'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function approvekepala_put()
    {
        $id = $this->put('id_surat');
        $data = array(
            'status' => '1',
            'approvement' => 'Disetujui'
        );
        if ($this->cuti->updateCuti($data, $id) > 0) {
            $this->response([
                'message' => 'surat approved.'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'message' => 'failed to approved'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function napprovekepala_put()
    {
        $id = $this->put('id_surat');
        $data = array(
            'status' => '1',
            'approvement' => 'Tidak disetujui'
        );
        if ($this->cuti->updateCuti($data, $id) > 0) {
            $this->response([
                'message' => 'surat approved.'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'message' => 'failed to approved'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function approvesekda_put()
    {
        $id = $this->put('id_surat');
        $data = array(
            'status' => '3'
        );
        if ($this->cuti->updateCuti($data, $id) > 0) {
            $this->response([
                'message' => 'surat approved.'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'message' => 'failed to approved'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function approvebupati_put()
    {
        $id = $this->put('id_surat');
        $data = array(
            'status' => '4'
        );
        if ($this->cuti->updateCuti($data, $id) > 0) {
            $this->response([
                'message' => 'surat approved.'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'message' => 'failed to approved'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function buatCutibkpsdm_put()
    {
        $id = $this->put('id_surat');
        $data = array(
            'status' => '2'
        );
        if ($this->cuti->updateCuti($data, $id) > 0) {
            $this->response([
                'message' => 'surat approved.'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'message' => 'failed to approved'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function unitkerja_get()
    {
        $this->db->select('*');
        $this->db->from('unit_kerja');
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function batasanCuti_post()
    {
        // $this->db->select('surat.banyak_cuti');
        // $this->db->from('user');
        // $this->db->join('surat', 'user.id_user=surat.id_user');
        // $this->db->where('user.id_user', $this->input->post('username'));
        // $this->db->where('surat.tahun', date("Y"));
        // $query = $this->db->get();

        $this->db->select_sum('surat.banyak_cuti');
        $this->db->join('surat', 'user.id_user=surat.id_user');
        $this->db->where('user.username', $this->input->post('username'));
        $this->db->where('surat.tahun', date("Y"));
        $query = $this->db->get('user');

        $this->response($query->result_array(), RestController::HTTP_OK);
    }

    public function datakepala_get()
    {
        $this->db->select('*');
        $query = $this->db->get_where('user', array('level' => 'Kepala Dinas'));

        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function datasekda_get()
    {
        $this->db->select('*');
        $query = $this->db->get_where('user', array('level' => 'Sekretaris Daerah'));

        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function databupati_get()
    {
        $this->db->select('*');
        $query = $this->db->get_where('user', array('level' => 'Bupati'));

        if ($query->num_rows() != 0) {
            $this->response(['data' => $query->result_array()], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'username salah'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
