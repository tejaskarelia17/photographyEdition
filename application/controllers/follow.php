<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of follow
 *
 * @author Saldanhas
 */
class follow extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('IPEModel');
    }
    
    function followers(){
      $logged=  $this->session->userdata('logged_in');
      if(!isset($logged))$logged=FALSE;
        
      if($logged){
        $followers=$this->IPEModel->getFollowers($this->session->userdata('id'));
        $stuff=array();
        foreach ($followers as $follower){
            $stuff[]=$this->IPEModel->getUserData($follower->follower);
        }
        $data['data']=$stuff;
        $data['name']="FOLLOWERS";
        $this->template->write_view('content', 'follow', $data, TRUE);
        $this->template->render();
      }
      else{
           redirect('/login', 'refresh');
      }

    }
    
    function following(){
      $logged=  $this->session->userdata('logged_in');
      if(!isset($logged))$logged=FALSE;
        
      if($logged){
        $following=$this->IPEModel->getFollowing($this->session->userdata('id'));
        $stuff=array();
        foreach ($following as $follower){
            $stuff[]=$this->IPEModel->getUserData($follower->following);
        }
        $data['data']=$stuff;
        $data['name']="FOLLOWING";
        $this->template->write_view('content', 'follow', $data, TRUE);
        $this->template->render();
      }
      else{
           redirect('/login', 'refresh');
      }

    }
    
    function addFollower($id){
        $uid=$this->session->userdata('id');
        if(isset($uid)){
            $this->IPEModel->addFollower($uid,$id);
            redirect ('view/profile/'.$id, 'refresh');
        }
        else 
            redirect ('login', 'refresh');
    }
    
    function removeFollower($id){
        $uid=$this->session->userdata('id');
        if(isset($uid)){
            $this->IPEModel->removeFollower($uid,$id);
            redirect ('view/profile/'.$id, 'refresh');
        }
        else 
            redirect ('login', 'refresh');
    }
}

?>
