<title>Red-Eye Photography</title>
<?php

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$logged_in = $this -> session -> userdata('logged_in');
		if (!isset($logged_in))
			$logged_in = FALSE;
		if (!$logged_in) {
			redirect('/welcome', 'refresh');
		}
		
		$this->load->model('dashboard_model');
	}

	public function index() {		
		if($mostStaredPicture = $this->dashboard_model->mostStaredPicture()){
			$data['mostStaredPicture_id']=$mostStaredPicture->pid;
			$data['mostStaredPicture_loc']=$mostStaredPicture->location;
		}else{
			$data['mostStaredPicture_id']='-';
			$data['mostStaredPicture_loc']='-';
		}
		
		if($mostStaredAlbum = $this->dashboard_model->mostStaredAlbum()){
			$data['mostStaredAlbum_id']=$mostStaredAlbum->album_id;
			$data['mostStaredAlbum_cover']=$this->dashboard_model->getAlbumCover($mostStaredAlbum->cover_pic_id);
		}else{
			$data['mostStaredAlbum_id']='-';
			$data['mostStaredAlbum_cover']='-';
		}
		
		if($mostCommentedPicture = $this->dashboard_model->mostCommentedPicture()){
			$data['mostCommentedPicture_id']=$mostCommentedPicture->pid;
			$data['mostCommentedPicture_loc']=$mostCommentedPicture->location;
		}else{
			$data['mostCommentedPicture_id']='-';
			$data['mostCommentedPicture_loc']='-';
		}
		
		$data['friends']=$this->dashboard_model->friends();
		$data['followers']=$this->dashboard_model->followers();
		$data['following']=$this->dashboard_model->following();
		$data['credits']=$this->dashboard_model->credits();
		
		$this->load->view('dashboard/index',$data);
	}

	public function updates() {
		
		$this->load->model('IPEModel');			
		$data['data']= $this->IPEModel->getNotifications($this->session->userdata('id'),NULL);
        $this->session->set_userdata('noOfnotifications', 0);
		//$data['result0']=$this->dashboard_model->getUpdates();
		$data['result1']=$this->dashboard_model->getNews('1');
		$this->load->view('dashboard/updates',$data);
	}

	public function messages() {
		$data['result'] = $this->dashboard_model->getMessages();
		$this->load->view('dashboard/messages',$data);
	}

	public function requests() {
		$data['friend'] = $this->dashboard_model->requestFriend();
		$data['credit'] = $this->dashboard_model->requestCredit();
		$this->load->view('dashboard/requests',$data);
	}

	public function accept_friend($id) {
		$this->dashboard_model->accept_friend($id);
		$this->requests();
	}

	public function deny_friend($id) {
		$this->dashboard_model->deny_friend($id);
		$this->requests();
	}

	public function accept_credit($id) {
		$this->dashboard_model->accept_credit($id);
		$this->requests();
	}

	public function deny_credit($id) {
		$this->dashboard_model->deny_credit($id);
		$this->requests();
	}

	public function friends() {
		$data = array();
		$this->load->view('dashboard/friends',$data);
	}

	public function following() {
		$data = array();
		$this->load->view('dashboard/following',$data);
	}

	public function followers() {
		$data = array();
		$this->load->view('dashboard/followers',$data);
	}

	public function credits() {
		$data['result'] = $this->dashboard_model->getCredits();
		$this->load->view('dashboard/credits',$data);
	}

	public function analyse() {$data = array();
		$this->index();
	}

}
