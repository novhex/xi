<?php

defined('BASEPATH') or exit('Error');

/**
 *
 */
class Ajax extends CI_Controller
{

public  function __construct()
  {
    # code...
    parent::__construct();
    $this->load->library(array('session'));
    $this->load->model('home_model');
  }

  public function getbookbyId()
  {
    # code...
    $id = $this->input->get('bookid');
    $data['bookinfo'] = $this->home_model->getBook_byId($id);
    $this->load->view('viewbook_ajax',$data);

  }

  public function login(){
    $username = $this->input->post('uname');

    $result = $this->home_model->getLoginInfo($this->input->post('uname'),md5($this->input->post('pass')));

      if($result==1){
         echo $result;
        $this->session->set_userdata('username',$username);
      }else{
        $username="";
      }
  }

  public function savebook(){
   $status = $this->home_model->savebookInfo($this->input->post('bookname'),$this->input->post('authormail'));
  echo $status;
  }
  
  public  function deletebook(){
      $bookid = $this->input->get('bookid');
      $response = $this->home_model->deletebook($bookid);
      
      echo $response;
  }
}
