<?php

class M_cuti extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get_where('surat', array('surat.status' => '2', 'surat.approvement' => 'Disetujui'));
        return $query->result();
    }

    public function tampil_bkpsdm()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get_where('surat', array('surat.status' => '1', 'surat.approvement' => 'Disetujui'));
        return $query->result();
    }

    public function tampil_bupati()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get_where('surat', array('surat.status' => '3', 'surat.approvement' => 'Disetujui'));
        return $query->result();
    }

    public function tampil_data_kepalaDinas()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get_where('surat', array('surat.status' => '4'));
        return $query->result();
    }

    public function tampil_data_pegawai()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get_where('surat', array('surat.status' => '4', 'surat.id_user' => $this->session->userdata('id_user')));
        return $query->result();
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function get_user($id)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE id_user='$id'");
        return $hasil->result();
    }

    public function detail_data($id = NULL)
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get_where('surat', array('id_surat' => $id))->row();
        return $query;
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function detailcutiall()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get_where('surat', array('surat.status' => '4'));
        return $query->result();
    }

    public function tampilBuatCuti()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get_where('surat', array('surat.status' => '2', 'surat.approvement' => 'Disetujui'));
        return $query->row_array();
    }

    public function tampilBuatCutibupati()
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get_where('surat', array('surat.status' => '3', 'surat.approvement' => 'Disetujui'));
        return $query->row_array();
    }

    public function dataKepalaDinas()
    {
        $this->db->select('*');
        $query = $this->db->get_where('user', array('level' => 'Kepala Dinas'));
        return $query->row_array();
    }

    public function datasekda()
    {
        $this->db->select('*');
        $query = $this->db->get_where('user', array('level' => 'Sekretaris Daerah'));
        return $query->row_array();
    }

    public function databupati()
    {
        $this->db->select('*');
        $query = $this->db->get_where('user', array('level' => 'Bupati'));
        return $query->row_array();
    }

    public function banyakCuti()
    {
        $this->db->where('status', '4');
        $this->db->where('approvement', 'Disetujui');
        $num_rows = $this->db->count_all_results('surat');
        return $num_rows;
    }

    public function banyakCutipegawai()
    {
        $this->db->where('status', '4');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $num_rows = $this->db->count_all_results('surat');
        return $num_rows;
    }

    public function banyakCutiKepalaDinas()
    {
        $this->db->where('status', '4');
        $num_rows = $this->db->count_all_results('surat');
        return $num_rows;
    }

    public function banyakCutbkpsdm()
    {
        $this->db->where('status', '4');
        $num_rows = $this->db->count_all_results('surat');
        return $num_rows;
    }
    public function banyakCutisekda()
    {
        $this->db->where('status', '3');
        $num_rows = $this->db->count_all_results('surat');
        return $num_rows;
    }

    public function banyakCutibupati()
    {
        $this->db->where('status', '3');
        $num_rows = $this->db->count_all_results('surat');
        return $num_rows;
    }

    public function updateCuti($data, $id)
    {
        $this->db->update('surat', $data, ['id_surat' => $id]);
        return $this->db->affected_rows();
    }
}
