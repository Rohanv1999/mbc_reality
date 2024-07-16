<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom extends CI_Model {


    public function max_id($field,$table){
        $sql = $this->db->select_max($field)
                        ->from($table)
                        ->get();

                        return $sql->row_array();

    }

    public function count($where='',$table=''){
        if($where!=''){
            $query = $this->db->query("SELECT * FROM ".$table." ".$where);
            return $query->num_rows();
        }else{
            $query = $this->db->query("SELECT * FROM ".$table);
            return $query->num_rows();
        }
    }
}