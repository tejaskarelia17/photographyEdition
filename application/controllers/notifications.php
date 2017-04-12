<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notifications
 *
 * @author Saldanhas
 */
class notifications extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('IPEModel');
        $logged=  $this->session->userdata('logged_in');
        if(!isset($logged))$logged=FALSE;
        if(!$logged)redirect('/login', 'refresh');
    }
    
    public function index(){
            $data['data']= $this->IPEModel->getNotifications($this->session->userdata('id'),NULL);
            $data['title']="NOTIFICATIONS";
            $this->session->set_userdata('noOfnotifications', 0);
            $this->template->write_view('content', 'viewNotifications', $data, TRUE);
            $this->template->render();
    }
    
    public function feed(){
            $data['data']= $this->IPEModel->getFeed($this->session->userdata('id'),NULL);
            $data['title']="FEED";
            $this->template->write_view('content', 'viewNotifications', $data, TRUE);
            $this->template->render();        
    }
}

?>
