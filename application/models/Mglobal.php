<?php

class Mglobal extends CI_Model
{
    function simpan($tbl, $data)
    {
        return $this->db->insert($tbl, $data);
    }
    function update($table, $set = null, $where = null)
    {
        $this->db->set($set);
        $this->db->where($where);
        return $this->db->update($table);
    }
    function hapus($tbl, $data)
    {
        $this->db->where($data);
        return $this->db->delete($tbl);
    }
    function get($tbl, $data)
    {
        return $this->db->get_where($tbl, $data);
    }
}
