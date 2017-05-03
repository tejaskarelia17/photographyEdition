<title>Red-Eye Photography</title>
<?php 


class newupload extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $loggedIn=  $this->session->userdata('logged_in');
        if(!isset($loggedIn)){
            redirect('/welcome', 'refresh');
        }
        if(!$loggedIn){
             redirect('/welcome', 'refresh');
        }
       $this->load->model('IPEModel');
       }
    
    function index(){
                $data['categories']=$this->IPEModel->getCategories();
        $data['albums']=$this->IPEModel->getAlbums($this->session->userdata('id'));
        $this->template->write_view('content', 'magic', $data, TRUE);
    	      $this->template->render();
    }
}