<?php

class M_permohonan extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function tampil_suratPegawai()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $this->db->where("(user.id_user='$id')");
        return $this->db->get()->result();
    }

    public function detail_suratPegawai($id = NULL)
    {
        $this->db->select('*');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $query = $this->db->get_where('surat', array('user.id_user' => $id))->row();
        return $query;
    }

    public function tampilbuat_surat()
    {
        $this->db->select('*');
        $query = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')]);
        return $query->row_array();
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

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function id_otomatis()
    {
        $this->db->select('RIGHT(surat.id_surat,3) as kode', FALSE);
        $this->db->order_by('id_surat', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('surat');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "SRT-" . $kodemax;
        return $kodejadi;
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

    public function tampilapprovement()
    {
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->join('user', 'user.id_user=surat.id_user');
        $this->db->where("(surat.status='1')");
        $this->db->not_like('surat.approvement', 'Tidak disetujui');
        $query = $this->db->get();
        return $query->result();
    }

    public function approvement($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function banyakPermohonan()
    {
        $this->db->where('status', '1');
        $this->db->where('approvement', 'Disetujui');
        $num_rows = $this->db->count_all_results('surat');
        return $num_rows;
    }

    public function banyakPermohonanpegawai()
    {
        $this->db->where('status', '1');
        $this->db->where('approvement', 'Disetujui');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $num_rows = $this->db->count_all_results('surat');
        return $num_rows;
    }

    public function banyakPermohonanKepalaDinas()
    {
        $this->db->where('status', '1');
        $this->db->where('approvement', '');
        $num_rows = $this->db->count_all_results('surat');
        return $num_rows;
    }

    public function deleteSurat($id)
    {
        $this->db->delete('surat', ['id_surat' => $id]);
        return $this->db->affected_rows();
    }

    public function createSurat($data)
    {
        $this->db->insert('surat', $data);
        return $this->db->affected_rows();
    }

    public function createuser($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }

    public function updateSurat($data, $id)
    {
        $this->db->update('surat', $data, ['id_surat' => $id]);
        return $this->db->affected_rows();
    }
}
