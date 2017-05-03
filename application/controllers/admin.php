<title>Red-Eye Photography</title>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('IPEModel');
        $loggedIn=  $this->session->userdata('logged_in');
        if(!isset($loggedIn)){
            redirect('/welcome', 'refresh');
        }
        if(!$loggedIn){
             redirect('/welcome', 'refresh');
        }
        if(!$this->IPEModel->isAdmin($this->session->userdata('id')))redirect('/welcome', 'refresh');
    }
    
    public function index(){
        $this->template->write_view('content', 'admin',array(), TRUE);
        $this->template->render();      
    }
    
    public function addContest(){
        $this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');

         $this->form_validation->set_rules('title','Subject','required');
         $this->form_validation->set_rules('startdate','Start Date','required');
         $this->form_validation->set_rules('enddate','End Date','required');
            if ($this->form_validation->run() == FALSE){
                $data['errors']=  validation_errors();
                $this->template->write_view('content', 'addcontest',$data, TRUE);
                $this->template->render();
            }
            else{
                $id=$this->IPEModel->addContest($_POST['description'],$_POST['title'],$_POST['startdate'],$_POST['enddate']);
                redirect("/contest/view/$id", 'refresh');
            }
    }

    public function viewReportAbuse(){
      $data['data']=$this->IPEModel->getReportAbuse();
             $this->template->write_view('content', 'viewabusereport',$data, TRUE);
        $this->template->render();      

    }

    public function deleteuser($uid){
        $this->IPEModel->deleteUser($uid);
    }

}
?>
