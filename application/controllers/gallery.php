<?php 

class gallery extends CI_Controller{
    
    public function index($album_id){
        $this->load->model('IPEModel');
        $data['array']=$this->IPEModel->getAlbumData($album_id);
        $data['albumname']=$this->IPEModel->getAlbumName($album_id);
        $data['userdata']=  $this->IPEModel->getUserData($data['albumname']->uid);
        $data['albumname']=$data['albumname']->name;
                 $this->load->view('galleria', $data);
         //$this->template->render();
    }
}