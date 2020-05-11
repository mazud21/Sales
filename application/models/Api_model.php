<?php 
class Api_model extends CI_Model{
    public function getApi(){
        //return $this->db->get('masalah_air')->result_array();
        $this->db->select('*');
        $this->db->from('sales');
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>