<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contest
 *
 * @author Saldanhas
 */
class contest extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('IPEModel');
    }
    function index(){
        $data['data']=$this->IPEModel->getContests(TRUE); 
        for($i=0;$i<count($data['data']);$i++){
            if($data['data'][$i]->winner_id!=0){
                $data['data'][$i]->winnerdata=  $this->IPEModel->getAllPhotoData($this->IPEModel->getContestWinner($data['data'][$i]->winner_id)->picture_id);
            }
            else{
                
            }
        }
        $this->template->write_view('content', 'viewcontests', $data, TRUE);
        $this->template->render();
    }
    
    function view($id){
        $data['data']=$this->IPEModel->getContestDetails($id);
        $loggedIn=$this->session->userdata('logged_in');
        $winner=$this->IPEModel->getContestWinner($id);
        if(!empty($winner)){
            $picture=$this->IPEModel->getAllPhotoData($winner->picture_id,NULL);
            $data['winner']=$picture;
        }
        else{
        if(!isset($loggedIn))$loggedIn=FALSE;
        
        if($loggedIn)
            $isAdmin=$this->IPEModel->isAdmin($this->session->userdata('id'));
        else
            $isAdmin=FALSE;
        $data['logged_in']=$loggedIn;
        $data['isAdmin']=$isAdmin;
        if($loggedIn){
            if($isAdmin){
                $data['pictureData']=$this->IPEModel->getContestPictures($id);
            }
            else{
                $uid=$this->session->userdata('id');
                $data['already']=$this->IPEModel->getIfUserInContest($id,$uid);
                if(empty($data['already']))
                $data['pictureData']=$this->IPEModel->getPicturesForUser($uid,0,-1,0);;
            }
        }
        }
        $this->template->write_view('content', 'viewcontest', $data, TRUE);
        $this->template->render();
        
     }
     

    function setwinner($id,$cid){
                $isAdmin=$this->IPEModel->isAdmin($this->session->userdata('id'));

                if($isAdmin)
        $this->IPEModel->setContestWinner($id,$cid);
    }
     
    function addPictureToContest($pid,$cid){
        $this->IPEModel->addPictureToContest($pid,$cid);
             redirect("/contest/view/$cid", 'refresh');
    }
}

?>
