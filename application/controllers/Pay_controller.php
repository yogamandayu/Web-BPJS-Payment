<?php
class Pay_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Pay_model');
  }

  public function index()
  {
    $this->load->view('pay/view_pay');
  }

  public function show(){
    $id = $this->input->post('id_account');
    $this->check_debt($id);
    if($data = $this->Pay_model->select($id)->row()){
      $data->status = '1';
      $this->load->view('pay/view_pay',$data);
    }
    else{
      $data['status'] = '0';
      $this->load->view('pay/view_pay',$data);
    }
  }

  public function check_debt($id){
    $data['debt_start'] = $this->Pay_model->select($id)->row('debt_start');
    $data['debt_end'] = $this->Pay_model->select($id)->row('debt_end');
    if(date('Y-m-d') > $data['debt_end']){
      $time = strtotime($data['debt_end']);
      $data['debt_end'] = date('Y-m-10', strtotime('+1 month', $time));

      $awal = new DateTime($data['debt_start']);
      $akhir = new DateTime($data['debt_end']);
      $diff = $akhir->diff($awal);

      $data["debt_month"] = ($diff->format('%y') * 12) + $diff->format('%m');
      $data["id_status"] = 0;
      $this->Pay_model->update_account($id,$data);
    }
  }

  public function pay(){
    $id = $this->input->get('id_account');
    $data['debt_end'] = $this->Pay_model->select($id)->row('debt_end');
    $data['debt_start'] = $data['debt_end'];
    $data['debt_month'] = 0;
    $data["id_status"] = 1;
    $this->Pay_model->update_account($id,$data);
    $this->load->view('pay/view_pay',$data);
  }
}
 ?>
