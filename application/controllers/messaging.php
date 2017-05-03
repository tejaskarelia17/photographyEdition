<title>Red-Eye Photography</title>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of messaging
 *
 * @author Saldanhas
 */
 
 
 
class messaging extends CI_Controller{
    
    public function __construct() {
    
        parent::__construct();
        $this->load->model('IPEModel');
    }
    
    
    public function send($uid){
        $logged=  $this->session->userdata('logged_in');
        if(!isset($logged))$logged=FALSE;
         
        if($logged){
            $this->IPEModel->addMessage($this->session->userdata('id'),$uid,$_POST['message']);
            $data['data']=$this->IPEModel->getMessageThread($this->session->userdata('id'),$uid);
            $data['username']=$this->IPEModel->getUserData($uid);
            $data['username']=$data['username']['userData']->username;
            $data['uid2']=$uid;
            $this->template->write_view('content', 'messageThread', $data, TRUE);
    	    $this->template->render();
        }
        else{
           redirect('/login', 'refresh');

        }
    }
    
    public function getThread($uid){
        $logged=  $this->session->userdata('logged_in');
        if(!isset($logged))$logged=FALSE;
        
        if($logged){ 
            $data['data']=$this->IPEModel->getMessageThread($this->session->userdata('id'),$uid);
            $data['username']=$this->IPEModel->getUserData($uid);
            $data['username']=$data['username']['userData']->username;
            $data['uid2']=$uid;
            $this->template->write_view('content', 'messageThread', $data, TRUE);
    	    $this->template->render();
			
        }
        else{
           redirect('/login', 'refresh');
        }
    }   

}

?>
