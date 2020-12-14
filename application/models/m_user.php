<?php

class M_user extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('unit_kerja', 'user.id_unitkerja=unit_kerja.id_unitkerja');
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function id_otomatis()
    {
        $this->db->select('RIGHT(user.id_user,3) as kode', FALSE);
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('user');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "USR-" . $kodemax;
        return $kodejadi;
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('user', array('id_user' => $id))->row();
        return $query;
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getUser($id = null)
    {
        if ($id === null) {
            return $this->db->get('user')->result_array();
        } else {
            return $this->db->get_where('user', ['id_user' => $id])->result_array();
        }
    }

    public function deleteUser($id)
    {
        $this->db->delete('user', ['id_user' => $id]);
        return $this->db->affected_rows();
    }

    public function createUser($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }

    public function updateUser($data, $id)
    {
        $this->db->update('user', $data, ['id_user' => $id]);
        return $this->db->affected_rows();
    }

    public function tampil_profil()
    {
        $this->db->select('*');
        $query = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')]);
        return $query->row_array();
    }

    public function cek_old()
    {
        $old = $this->input->post('pwlama');
        $this->db->where('password', $old);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function save()
    {
        $pass = $this->input->post('pwbaru2');
        $data = array(
            'password' => $pass
        );
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('user', $data);
    }
}
