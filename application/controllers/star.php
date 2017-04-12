<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of star
 *
 * @author Saldanhas
 */
class star extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();  
        $this->load->model('IPEModel');
    }
    
    function add($pid,$no){
        $loggedIn=  $this->session->userdata('logged_in');
        $check=TRUE;
        if(!isset($loggedIn)){
            $check=FALSE;
        }
        if(!$loggedIn){
            $check=FALSE;
        }
        if($check){
            if($this->IPEModel->addStar($this->session->userdata('id'),$pid,$no)){
                echo $this->IPEModel->getStar($pid);
            }
            else 
                echo "FALSE";
        }
        else {
            echo "FALSE";
        }
    }
    
    function remove($pid){
        $loggedIn=  $this->session->userdata('logged_in');
        $check=TRUE;
        if(!isset($loggedIn)){
            $check=FALSE;
        }
        if(!$loggedIn){
            $check=FALSE;
        }      
        if($check){
        if($this->IPEModel->removeStar($this->session->userdata('id'),$pid)) echo $this->IPEModel->getStar($pid);
        else 
                echo "FALSE";
        }
        else {
            echo "FALSE";
        }    
    }
    
    function addView($pid){
                if($this->IPEModel->addView($pid))
            echo "TRUE";
        else 
            echo "FALSE";
    }
}

?>
