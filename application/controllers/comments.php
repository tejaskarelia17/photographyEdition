<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comments
 *
 * @author Saldanhas
 */
class comments extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('IPEModel');
    }
    
    public function viewComments($pid){
        $data['comments']=$this->IPEModel->getComments($pid);
        $data['pid']=$pid;
        $this->load->view('comments',$data);
    }
    
    public function addComments($pid){
        $logged=  $this->session->userdata('logged_in');
        if(!isset($logged))$logged=FALSE;
         
        if($logged){
            if(isset($_POST)){
                $uid=  $this->session->userdata('id');
                $this->IPEModel->addComment($uid,$pid,$_POST['comment'],NULL);
                $this->viewComments($pid);
            }    
            else {
                echo $this->viewComments($pid);
            }
        }
        else {
            echo $this->viewComments($pid);
        }
    }
    
    public function deleteComment($cid,$id){
        $this->IPEModel->deleteComment($cid);
        //header('location',$_SERVER['HTTP_REFERER']);
        redirect('/view/photo/'.$id, 'refresh');
    }
}

?>
