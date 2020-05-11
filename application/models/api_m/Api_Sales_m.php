<?php 
class Api_Sales_m extends CI_Model{
    public function getApi(){
        //return $this->db->get('masalah_air')->result_array();
        $this->db->select('*');
        $this->db->from('sales');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deleteSales($SaANo){
        $this->db->delete('sales', ['SaANo' => $SaANo]);
        return $this->db->affected_rows();
    }

    public function createSales($data_Sales){
        $this->db->insert('sales', $data_Sales);
        return $this->db->affected_rows();
    }

    public function updateSales($data_Sales, $SaANo){
        $this->db->update('sales', $data_Sales, ['SaANo' => $SaANo]);
        return $this->db->affected_rows();
    }
}
?>