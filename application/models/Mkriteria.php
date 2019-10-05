<?php

class Mkriteria extends CI_Model
{
    private $table = 'kriteria';
    function getData($where = null)
    {
        if ($where == null) {
            // $this->db->order_by('kdkriteria', 'DESC');
            return $this->db->get($this->table);
        } else {
            $this->db->where($where);
            // $this->db->order_by('kdkriteria', 'DESC');
            return $this->db->get($this->table);
        }
    }
}
