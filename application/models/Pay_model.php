<?php
class Pay_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function select($id){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->join('bpjs_account','user.id_user = bpjs_account.id_user');
    $this->db->join('bpjs_class','bpjs_class.id_class = bpjs_account.id_class');
    $this->db->join('status','status.id_status = bpjs_account.id_status');
    $this->db->where('user.id_user',$id);
    return $this->db->get();
  }

  public function update_account($id,$data){
    $this->db->where('id_account', $id);
    $this->db->update('bpjs_account', $data);
  }
}
 ?>
