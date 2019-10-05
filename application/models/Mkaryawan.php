<?php

class Mkaryawan extends CI_Model
{
    private $table = 'karyawan';
    function getData($where = null)
    {
        if ($where == null) {
            return $this->db->get($this->table);
        } else {
            $this->db->where($where);
            return $this->db->get($this->table);
        }
    }
}
