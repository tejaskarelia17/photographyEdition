<?php

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();		
		$this->load->model('dashboard_model');
	}

	public function index() {
		$data['result0']=$this->dashboard_model->getNews('0');
		$data['result1']=$this->dashboard_model->getNews('1');
		$this->template->write_view('content', 'news',$data , TRUE);
        	$this->template->render();
	}

	public function newsitem($id) {
		$this->load->model('IPEModel');
		//if(!$this->IPEModel->isAdmin($this->session->userdata('id')))redirect('/welcome', 'refresh');
		$data['postdata']=$this->IPEModel->getNewsItem($id);
		$this->template->write_view('content', 'newsitem',$data , TRUE);
        	$this->template->render();
	}

	public function addnews() {
		$this->load->model('IPEModel');
		if(!$this->IPEModel->isAdmin($this->session->userdata('id')))redirect('/welcome', 'refresh');
		$this->template->write_view('content', 'addnews',array() , TRUE);
        	$this->template->render();
	}
	
	public function delete($id) {
		$this->load->model('IPEModel');
		if(!$this->IPEModel->isAdmin($this->session->userdata('id')))redirect('/welcome', 'refresh');
		$this->IPEModel->deleteNews($id);   		
		redirect('/news', 'refresh');
	}

	public function add() {
		$this->load->model('IPEModel');
		if(!$this->IPEModel->isAdmin($this->session->userdata('id')))redirect('/welcome', 'refresh');
		
		//code to upload image
		
                $config['upload_path'] = './uploads/news';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']=0;
                $config['overwrite']=FALSE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload()){
			$data['error'] = array('uperror' => $this->upload->display_errors());
                       	echo "E".$data['error']['uperror'];
		}
		else{
	            	$data = $this->upload->data();
	            	
	            	/*
	            	$origWidth = $data['image_width'];
	            	$origHeight = $data['image_height'];
	            	if($origWidth>2500 || $origHeight>1400){
	            		$newWidth = 1900;
	            		$newHeight = $newWidth*$origHeight/$origWidth;
	            	}else{
	            		$newWidth = $origWidth;
	            		$newHeight = $newWidth*$origHeight/$origWidth;               
	            	}
            		
	            	$resize = array(
		                'image_library'=>'imagemagick',
		                'library_path' => '/usr/bin',
		                'source_image'=>'./uploads/news/'.$data['file_name'],
		                'create_thumb' => FALSE,	
		                'maintain_ratio'=>FALSE,
		                'width'=>$newWidth,
		                'height'=>$newHeight
		            );
	            	$this->load->library('image_lib', $resize); 
	           	$data['image_width']=$newWidth;
	          	$data['image_height']=$newHeight;
	            	if(!$this->image_lib->resize());
	                  	//echo "S".json_encode($data);
	                  						
			//code to insert
			//$_POST['type']
			*/
			
			$resize = array(
                                'image_library'=>'imagemagick',
                   		'library_path' => '/usr/bin',
                          	'source_image'=>'./uploads/news/'.$data['file_name'],
                            	'create_thumb' => FALSE,
                            	'maintain_ratio'=>TRUE,
                            	'quality' => '70%',
                            	'width'=>512
                        	);
		            $this->load->library('image_lib', $resize); 
		            $this->image_lib->resize();
			
		
	        	$this->IPEModel->addNews($_POST['title'],nl2br($_POST['message']),$data['file_name'],$_POST['type']);   		
			redirect('/news', 'refresh');
		}
	}
	
}	