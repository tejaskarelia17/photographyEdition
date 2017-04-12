<?php
class buysell extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('IPEModel');
    }
    
    function index($skip=0,$limit=10){
        $skip=$skip*$limit;
        $data['logged_in']=  $this->session->userdata('logged_in');
        if(!isset($data['logged_in']))$data['logged_in']=FALSE;
        $data['data']=  $this->IPEModel->viewAds($skip,$limit);
        $this->template->write_view('content', 'viewAds',$data, TRUE);
       $this->template->render();    
    }
    
    function addAd(){
        $logged_in = $this->session->userdata('logged_in');
        if(!isset($logged_in))
            $logged_in = FALSE;      
        
        if(!$logged_in){
                 redirect('/login', 'refresh');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item','Item','required');
        $this->form_validation->set_rules('message','Message','required');
        $this->form_validation->set_rules('category','Category','required');
        $this->form_validation->set_rules('prange','Price ','required|integer');
        $this->form_validation->set_rules('contact','Contact Number','required|number');
        $this->form_validation->set_rules('location','Location','required');
        
	if ($this->form_validation->run() == FALSE)
	{     
            echo "Form validation";
            $this->template->write_view('content', 'addAd',array(), TRUE);
            $this->template->render();    
        }
        else{
               $config['upload_path'] = './uploads/buysell';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['overwrite']=FALSE;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload()){
			$data['error'] = array('uperror' => $this->upload->display_errors());
                        $data['owner']=true;
                        $details=  $this->IPEModel->getUserDetailsById($this->session->userdata('id'));
                        $data['name']=$details->username;
                        $data['email']=$details->email;       
                        $data['bio']=$details->bio;
                        $data['profileImage']=$details->profileImage;
                        echo "Upload Error";
                        //$this->template->write_view('content', 'addAd',array(), TRUE);
                        //$this->template->render();    
                }
                else{
                    $data =$this->upload->data();
                    
                    $resize = array(
                                'image_library'=>'imagemagick',
                   		'library_path' => '/usr/bin',
                          	'source_image'=>'./uploads/buysell/'.$data['file_name'],
                            	'create_thumb' => FALSE,
                            	'maintain_ratio'=>TRUE,
                            	'quality' => '70%',
                            	'width'=>512
                        	);
	            $this->load->library('image_lib', $resize); 
	            $this->image_lib->resize();
            /*    
            $tagArray=  explode(',', $_POST['tagArray']);
            foreach ($tagArray as $tag){
                $this->IPEModel->addTag($tag);
            }
            */
            $data=$this->IPEModel->addAd($_POST['item'],$this->session->userdata('id'),$_POST['prange'],
                   nl2br($_POST['message']),$_POST['category'],$_POST['contact'],$_POST['location'],$data['file_name']);
            redirect("/buysell/viewAd/$data", 'refresh');
        }
        
    }}
    
    function viewAd($id){
        $data=$this->IPEModel->getBuySellThread($id);
        $data['logged_in']=  $this->session->userdata('logged_in');
        if(!isset($data['logged_in']))$data['logged_in']=FALSE;
        $this->template->write_view('content', 'viewAd',$data, TRUE);
        $this->template->render();    
    }


    function addToThread($thread_id){
        if(isset($_POST)){
            //$this->IPEModel->
        }
    }
    
    function search($tags=NULL){
        $searchTerm="";
        if(isset($_GET['search'])){
        if($_GET['search']!=""){
            $searchTerm=$_GET['search'];
        }}
        
        $min=0;
        if(isset($_GET['minimum'])){
        if($_GET['minimum']!="" && is_numeric($_GET['minimum'])){
            $min=$_GET['minimum'];
        }}
        
        $max=1000000;
        if(isset($_GET['maximum'])){
        if($_GET['maximum']!="" && is_numeric($_GET['maximum'])){
            $max=$_GET['maximum'];
        }}
        
        if(isset($_GET['place']))
            $place=$_GET['place'];
        else
            $place="";
        
        if(isset($_GET['model']))
            $model=$_GET['model'];
        else
            $model="";
            
        $data['data']=$this->IPEModel->searchBuySell($searchTerm,$model,$place,$max,$min);
        
        $data['search']=$searchTerm;
        $data['model']=$model;
        $data['place']=$place;
        //if($max==-1)$max=0;
        //if($min==-1)$min=1000000;
        $data['max']=$max;
        $data['min']=$min;
        $data['logged_in']=  $this->session->userdata('logged_in');
        if(!isset($data['logged_in']))$data['logged_in']=FALSE;

        $this->template->write_view('content', 'buysellsearch',$data, TRUE);
        $this->template->render();    
        
    }
    
}
?>
