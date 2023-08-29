<?php
class stock_matier_premier_model extends CI_Model
{
  public function __construct()
  {
   
  }
  public function get_stock_matier_premier($param=array()){
    return $this->db->where($param)->get('stock_matier_premier_madakem')->result_object();
  }
  public function get_detail_stock_matier_premier($param){
    return $this->db->where($param)->get('stock_matier_premier_madakem')->row_object();
    
  }
  public function insert_stock_matier_premier($data){
    return $this->db->insert('stock_matier_premier_madakem',$data);
  }
  public function update_stock_matier_premier($param,$data){
    return $this->db->where($param)->update('stock_matier_premier_madakem',$data);
  }
}
