<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the or.
 */

/**
 * Description of profile
 *
 * @author Lewis
 */
class profile extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('IPEModel');
    }
    
    public function index($id){
        echo $id;
       //$this->template->write_view('content', 'profile', array(), TRUE);
       //$this->template->render();
    }
    
    public function view($id){
        
        redirect('/view/profile/'.$id, 'refresh');
        /*
        $details=  $this->IPEModel->getUserData($id);
        //$this->IPEModel->getPicturesForUser($id,16,0);
        $uid=$this->session->userdata('id');
        if(isset($uid)){
            if(!empty($uid)){
            if($id==$uid)$data['owner']=true;
            else $data['owner']=FALSE;
            if(!$data['owner'])  $data['followable']=  $this->IPEModel->isfollowable($this->session->userdata('id'),$id);
            else $data['followable']=FALSE;
        }
        
        else{
            $data['followable']=TRUE;
            $data['owner']=FALSE;
        }
        }
        else{
            $data['followable']=TRUE;
            $data['owner']=FALSE;
        }
        $data['name']=$details['userData']->username;
        $data['email']=$details['userData']->email;    
        $data['site']=$details['userData']->website;    
        $data['contact']=$details['userData']->contact;    
        $data['facebook']=$details['userData']->facebook;    
        $data['twitter']=$details['userData']->twitter;    
        $data['site']=$details['userData']->website;    
        $data['bio']=$details['userData']->bio;
        $data['id']=$id;
        $data['data']=$this->IPEModel->getAllAlbumData($id);

        $data['pictures']=$this->IPEModel->getPicturesForUser($id,0);
        $data['profileImage']=$details['userData']->profileImage;
        $data['noOfFollowers']=$details['noOfFollowers'];
        $data['noOfFollowing']=$details['noOfFollowing'];
        $data['noOfPictures']=$details['noOfPictures'];
        $data['noOfAlbums']=$details['noOfAlbums'];

         $this->template->write_view('content', 'newprofile', $data, TRUE);
         $this->template->render();
        //$this->load->view('newprofile',$data);
        */
    }
    
    public function analysis($id){
        $details=  $this->IPEModel->getUserData($id);
        $data=array();
        $data['noOfFollowers']=$details['noOfFollowers'];
        $data['noOfFollowing']=$details['noOfFollowing'];
        $data['noOfPictures']=$details['noOfPictures'];
        $data['noOfAlbums']=$details['noOfAlbums'];
        $data['noOfFriends']=$details['noOfFriends'];
        $data=$this->IPEModel->analysis($id,$data);
        
        $this->load->view('analysis',$data);
    }
        

    
    public function albums($id){
        $uid=$this->session->userdata('id');
        if(isset($uid)){
            if(!empty($uid)){
            if($id==$uid)$data['owner']=true;
            else $data['owner']=FALSE;
            if(!$data['owner'])  $data['followable']=  $this->IPEModel->isfollowable($this->session->userdata('id'),$id);
            else $data['followable']=FALSE;
        }
        
        else{
            $data['followable']=TRUE;
            $data['owner']=FALSE;
        }
        }
        else{
            $data['followable']=TRUE;
            $data['owner']=FALSE;
        }
        $data['albums']=$this->IPEModel->getAlbumsfromUserID($id);
        $c=0;
        foreach($data['albums'] as $album){
            $data['albums'][$c++]->headLocation=$this->IPEModel->getAlbumHeadPicture($album->id);
        }
        
        print_r($data);
    }

    public function addBio(){
        if(isset($_POST)){
            $this->IPEModel->addBio($this->session->userdata('id'),$_POST['bio']);
        }
    }
    
    public function notifications($uid){
         $data['friendrequest']=$this->IPEModel->getFriendRequests($uid);
         $data['testimonialrequests']=$this->IPEModel->getUnConfirmedTestimonials($uid);
        $data['friends']=$this->IPEModel->getFriends($uid);
        $data['data']=array();
        foreach ($data['friends'] as $friend){
            $dataid=$friend->friend1;
            if($dataid==$uid)$dataid=$friend->friend2;
            $data['data'][]= $this->IPEModel->getFeed($dataid,NULL);
        }
        $data['followers']=$this->IPEModel->getFollowing($uid);
        foreach ($data['followers'] as $friend){
            $data['data'][]= $this->IPEModel->getFeed($friend->following,NULL);
        }
            $this->load->view('dashboard',$data);
    }
    
    public function edit($error=""){
    	$uid = $this->session->userdata('id');
        $data['data']= $this->IPEModel->getUser($uid);
       $this->template->write_view('content', 'edit_profile',$data, TRUE);
       $this->template->render();
    }
    
    public function password(){
    	$uid = $this->session->userdata('id');
        $data['data']= $this->IPEModel->getUser($uid);
       	$this->template->write_view('content', 'edit_pass',$data, TRUE);
       	$this->template->render();
    }
    
    public function editpass(){
    	 $this->load->model('IPEModel');
    	 if($_POST){
    	 	//$_POST['pass'];
    	 	$data['text']='Password Changed Successfully...';
    	 	$this->IPEModel->changePass($this->session->userdata('id'),$_POST['pass']);
    	 	$this->template->write_view('content', 'signupsuccess', $data, TRUE);
    	      	$this->template->render();
    	 }else{
    	 	redirect('/welcome', 'refresh');
    	 }
    }
    
    public function getMessages($user_id){
        $data['data']=$this->IPEModel->getNotifications($user_id,3);
        $this->load->view('messageProfile',$data);
    }

    public function editBasicProfile(){
        if(isset($_POST)){
            	$config['upload_path'] = './uploads/userProfile';
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
                        $this->template->write_view('content', 'e', $data, TRUE);
                        $this->template->render();		
                }
                else{
                    $data =$this->upload->data();
                                $resize = array(
                                'image_library'=>'imagemagick',
                                    'library_path' => '/usr/bin',
                          'source_image'=>'./uploads/images/'.$data['file_name'],
                            'create_thumb' => FALSE,
                            'maintain_ratio'=>FALSE,
                            'quality'=>'70%',
                            'width'=>200,
                            'height'=>200
                        );
            $this->load->library('image_lib', $resize); 
            $this->image_lib->resize();
                   $this->IPEModel->addBasicProfile($this->session->userdata('id'),$data['file_name']);
                }
            
            if(isset($_POST['username'])){
                $this->IPEModel->addUsername($this->session->userdata('id'),$_POST['username']);
            }
                        $this->IPEModel->addContact($this->session->userdata('id'),$_POST['contact']);
                        $this->IPEModel->addFacebook($this->session->userdata('id'),$_POST['facebook']);
                        $this->IPEModel->addTwitter($this->session->userdata('id'),$_POST['twitter']);
                        $this->IPEModel->addSite($this->session->userdata('id'),$_POST['site']);
                        $this->IPEModel->addbio($this->session->userdata('id'),$_POST['bio']);
                        redirect('/profile/view/'.$this->session->userdata('id'), 'refresh');
		
        }        
    }
    
    public function credits($uid){
    	$data['data']= $this->IPEModel->getUserData($uid);
        $data['array']=$this->IPEModel->getTestimonial($uid);
        $this->load->view('testimonial',$data);
    }
    
    function friends($uid){
       $f['array']=$this->IPEModel->getFriends($uid);
       for($i=0;$i<count($f['array']);$i++) {
           $datr=0;
           if($f['array'][$i]->friend1==$uid)
               $datr=$f['array'][$i]->friend2;
           else
               $datr=$f['array'][$i]->friend1;
           
           $f['array'][$i]=  $this->IPEModel->getUser($datr);
       }
       $f['name']='Friends';
       $this->load->view('friendsprofile',$f);
    }
    
    function followers($uid){
       $f['array']=$this->IPEModel->getFollowers($uid);
       for($i=0;$i<count($f['array']);$i++) {
           $datr=0;
           $datr=$f['array'][$i]->follower;           
           $f['array'][$i]=  $this->IPEModel->getUser($datr);
       }
       $f['name']='Followers';
       $this->load->view('friendsprofile',$f);
        
    }
    
    function following($uid){
       $f['array']=$this->IPEModel->getFollowing($uid);
       for($i=0;$i<count($f['array']);$i++) {
           $datr=0;
           $datr=$f['array'][$i]->following;           
           $f['array'][$i]=  $this->IPEModel->getUser($datr);
       }
       $f['name']='Following';
       $this->load->view('friendsprofile',$f);
        
    }

    public function addtestimonials(){
        if(isset($_POST)){
            $this->IPEModel->addTestimonial($_POST['uid'],$this->session->userdata('id'),$_POST['testimonial']);
        }
        redirect('/view/profile/'.$_POST['uid'],'refresh');
    }

    public function addCredit($id){
        if(isset($_POST)){
            $this->IPEModel->addTestimonial($id,$this->session->userdata('id'),$_POST['credit']);
        }
        redirect('/view/profile/'.$id,'refresh');
    }
    
    function addContact(){
        if(isset($_POST)){
            $this->IPEModel->addContact($this->session->userdata('id'),$_POST['contact']);
        }
    }      
    
    function cover(){
    
    	$uid = $this->session->userdata('id');
        $data['pictureData']=$this->IPEModel->getPicturesForUser($uid,0,-1,0);;
        $data['id']=$uid;
        $this->load->view('changecover', $data);
    }

    function changeCover(){
                    	$config['upload_path'] = './uploads/userProfile';
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
                        $this->template->write_view('content', 'e', $data, TRUE);
                        $this->template->render();		
                }
                else{
                    $data =$this->upload->data();
                    
                    $resize = array(
                                'image_library'=>'imagemagick',
                   		'library_path' => '/usr/bin',
                          	'source_image'=>'./uploads/userProfile/'.$data['file_name'],
                            	'create_thumb' => FALSE,
                            	'maintain_ratio'=>TRUE,
                            	'quality' => '70%',
                            	'width'=>1024
                        	);
	            $this->load->library('image_lib', $resize); 
	            $this->image_lib->resize();
                    
                    $this->IPEModel->changecover($this->session->userdata('id'),$data['file_name']);
                }
             redirect('/profile/view/'.$this->session->userdata('id'), 'refresh');
    }


    function addFriend($f2){
      $this->IPEModel->add_friend($this->session->userdata('id'),$f2);
      redirect ('profile/view/'.$f2);  
    }
    
    function confirmfriend($f2){
        $this->IPEModel->confirmfriend($this->session->userdata('id'),$f2);  
    }
    
    function rejectfriend($f2){
        $this->IPEModel->rejectfriend($this->session->userdata('id'),$f2);  
    }
    
    function confirmCredit($f2){
        $this->IPEModel->confirmTestimonials($this->session->userdata('id'),$f2);  
    }
    
    function rejectCredit($f2){
        $this->IPEModel->rejectTestimonials($this->session->userdata('id'),$f2);  
    }
    
    public function deleteuser($uid){
    	if($this->session->userdata('id')==$uid){
        	$this->IPEModel->deleteUser($uid);
        	redirect('/login/logout', 'refresh');
        }
    }
}

?>
