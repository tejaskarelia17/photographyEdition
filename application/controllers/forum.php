<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of forum
 *
 * @author Saldanhas
 */
class forum extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('IPEModel');
    }
    
    public function index(){
        if(!isset($data['logged_in']))$data['logged_in']=FALSE;
        $data['data']= $this->IPEModel->getForumPosts();
        
        $data['logged_in']=  $this->session->userdata('logged_in');
        if(!isset($data['logged_in']))$data['logged_in']=FALSE;

        for($i=0;$i<count($data['data']);$i++){
            $data['data'][$i]->userdata=$this->IPEModel->getUserData($data['data'][$i]->uid);
            $data['data'][$i]->timestamps=  $this->IPEModel->getLastForumTimestamp($data['data'][$i]->id);
            $data['data'][$i]->noofposts=  $this->IPEModel->getNoOfPostsForForum($data['data'][$i]->id);
        }        
        $data['name']="Forums";
        if(!isset($data['logged_in']))$data['logged_in']=FALSE;
        $this->template->write_view('content', 'forumCategory',$data, TRUE);
        $this->template->render();  
    }
    
    public function viewCategory($category){
        $id=$this->IPEModel->getCategoryId(utf8_decode(urldecode($category)))->id;
        $data['name']= utf8_decode(urldecode($category));
        $data['data']= $this->IPEModel->getForumPostInCategory($id);
        $data['logged_in']=  $this->session->userdata('logged_in');
                if(!isset($data['logged_in']))$data['logged_in']=FALSE;

        for($i=0;$i<count($data['data']);$i++){
            $data['data'][$i]->userdata=$this->IPEModel->getUserDetailsById($data['data'][$i]->uid);
        }        
        if(!isset($data['logged_in']))$data['logged_in']=FALSE;
        $this->template->write_view('content', 'forumCategory',$data, TRUE);
        $this->template->render();    

    }
    
    public function viewPost($id){
        $data['post']=  $this->IPEModel->getForumPost($id);
        $data['thread']=$this->IPEModel->getForumsThread($id);
        $data['logged_in']=  $this->session->userdata('logged_in');
        if(!isset($data['logged_in']))$data['logged_in']=FALSE;
        $data['userdata']=  $this->IPEModel->getUserData($data['post']->uid);
        $data['category']=$this->IPEModel-> getCategoryName($data['post']->category_id);
        for($i=0;$i<count($data['thread']);$i++){
            $data['thread'][$i]->userdata=$this->IPEModel->getUserData($data['thread'][$i]->uid);
        }
        if($data['logged_in']){
        $data['currentudata']=$this->IPEModel->getUserData($this->session->userdata('id'));
        }
        else{
            $data['currentudata']=new stdClass();
            $data['currentudata']->username="";
            $data['currentudata']->profileImage=NULL;
            $data['currentudata']->id=-1;
        }
        $this->template->write_view('content', 'forumPost',$data, TRUE);
        $this->template->render();    
    }
    
    public function getForumThread($id){
        print_r($this->IPEModel->getForumsThread($id));
    }

    public function addPost(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        $loggedIn=$this->session->userdata('logged_in');
        if(!isset($loggedIn)){
            $loggedIn=FALSE;
        }
        if($loggedIn){
            $this->form_validation->set_rules('title','Title','required');
            //$this->form_validation->set_rules('description','Message','required');
            if ($this->form_validation->run() == FALSE){
                $data['cat']=  $this->IPEModel->getCategories();
                $this->template->write_view('content', 'addNewForumPost',$data, TRUE);
                $this->template->render();
            }
            else{
                $id=$this->IPEModel->addForumPost($this->session->userdata('id'),$_POST['title'],nl2br($_POST['description']),1);
                redirect("/forum/viewPost/$id", 'refresh');
            }
        }
        else{
                 redirect('/welcome', 'refresh');
        }
    }
    
    public function addToThread($id){
                $loggedIn=$this->session->userdata('logged_in');
                $c="1";
        if(!isset($loggedIn)){
            $loggedIn=FALSE;
        }
        if($loggedIn){ 
            $this->IPEModel->addForumPost($this->session->userdata('id'),"",nl2br($_POST['message']),$c,$id);
                            redirect("/forum/viewPost/$id", 'refresh');

        }
        else{
            echo "FALSE";
        }
    }
}

?>
