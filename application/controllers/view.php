<title>Red-Eye Photography</title>
<?php
class view extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model('IPEModel');
    }
    
    public function index(){
        
    }
    
    public function profile($id){
       $data['data']= $this->IPEModel->getUserData($id);
       $data['credits']=$this->IPEModel->getTestimonial($id,1);
       $data['id']=$id;
             $loggedIn=  $this->session->userdata('logged_in');
        
        if(!isset($loggedIn)){
            $loggedIn=FALSE;
        }
        //else{ if($this->session->userdata('id')==$id)redirect ('profile/view/'.$id); }
        if(!$loggedIn){
            $loggedIn=FALSE;
        }
        $data['loggedIn']=$loggedIn;
       	$uid=$this->session->userdata('id');
       	$data['uid']=$this->session->userdata('id');
        if(isset($uid) && !empty($uid)){
            $data['admin']=$this->IPEModel->isAdmin($this->session->userdata('id'));
            
            if($id==$uid)
            	$data['owner']=TRUE;
            else
            	$data['owner']=FALSE;
            	
            if(!$data['owner']){
            	$data['followable']=  $this->IPEModel->isfollowable($id,$this->session->userdata('id'));
            	$data['friendable']=  $this->IPEModel->isfriendable($id,$this->session->userdata('id'));            	
            }else{
            	$data['followable']=FALSE;
            	$data['friendable']=FALSE;
            }
        }
        else{
            $data['followable']=FALSE;
            $data['friendable']=FALSE;
            $data['owner']=FALSE;
            $data['admin']=FALSE;
        } 
       $this->load->view('outerprofileview',$data);
    }

     function photo($id){
        $this->IPEModel->addView($id);
        $loggedIn=  $this->session->userdata('logged_in');
        
        if(!isset($loggedIn)){
            $loggedIn=FALSE;
        }
        if(!$loggedIn){
            $loggedIn=FALSE;
        }
        $uid=$this->session->userdata('id');
        if($loggedIn){
           $data=$this->IPEModel->getAllPhotoData($id,$uid);
           $data['stars']=  round($this->IPEModel->getStar($id,$uid));
        }
        else{
            $data=$this->IPEModel->getAllPhotoData($id);
            $data['stars']=  round($this->IPEModel->getStar($id));
        }
        if(!empty($uid)){
            $data['adminData']=$this->IPEModel->isAdmin($uid);
            if(!$data['adminData'])$data['adminData']=$this->IPEModel->isOwnerOfPicture($id,$this->session->userdata('id'));
        }
        else
            $data['adminData']=FALSE;
        
       $data['randomeimages']=$this->IPEModel->getPicturesForUser($data['userData']['userData']->id,0,9,0,true);
        $data['logger']=$loggedIn;$data['fs']=TRUE;
       $this->template->write_view('content', 'photoView',$data, TRUE);
        $this->template->render();    
    }
    
    public function albums($uid){
         $id=$uid;
                 $details=  $this->IPEModel->getUserData($id);
        //$this->IPEModel->getPicturesForUser($id,16,0);
        $uid=$this->session->userdata('id');
        if(isset($uid)){
            if(!empty($uid) || $uid!=""){
            if($id==$uid)$data['owner']=true;
            else $data['owner']=FALSE;
            if(!$data['owner'])  $data['followable']=  $this->IPEModel->isfollowable($this->session->userdata('id'),$id);
            else $data['followable']=FALSE;
         $data['data']=$this->IPEModel->getAllAlbumData($uid,  $this->session->userdata('id'));
        }
        else{
         $data['data']=$this->IPEModel->getAllAlbumData($id);
            $data['followable']=TRUE;
            $data['owner']=FALSE;
        }
        }
        else{
            $data['followable']=TRUE;
            $data['owner']=FALSE;
        }

        for($i=0;$i<count($data['data']);$i++){
            $data['data'][$i]->albumStuff=$this->IPEModel->getAlbumPictures($data['data'][$i]->id);
        }
        $data['name']=$details['userData']->username;
        $data['id']=$id;
         //print_r($data);
        $this->template->write_view('content', 'albumList',$data, TRUE);
        $this->template->render();    
    }
    
    public function albumgallery($id){
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
        $data['bio']=$details['userData']->bio;
        $data['id']=$id;
        $data['data']=$this->IPEModel->getAllAlbumData($id);

        $data['pictures']=$this->IPEModel->getPicturesForUser($id,0);
        $data['profileImage']=$details['userData']->profileImage;
        $data['noOfFollowers']=$details['noOfFollowers'];
        $data['noOfFollowing']=$details['noOfFollowing'];
        $data['noOfPictures']=$details['noOfPictures'];
        $data['noOfAlbums']=$details['noOfPictures'];

         $this->template->write_view('content', 'albumgallery', $data, TRUE);
         $this->template->render();
    }
    
    public function album($album_id){
        $data['data']=$this->IPEModel->getAlbumData($album_id);
        $categoryName=$this->IPEModel->getAlbumName($album_id)->name;
        $limit=20;
        $data['images']=$this->IPEModel->getAlbumData($album_id);
        $data['categoryName']=$categoryName;
        for($i=0;$i<count($data['images']);$i++)
        $data['images'][$i]->stars= round($this->IPEModel->getStar($data['images'][$i]->id)/2);
        $data['categoryID']=$this->IPEModel->getCategoryId($categoryName);
        $this->template->write_view('content', 'category',$data, TRUE);
        $this->template->render();   
    }
    
    public function reportAbuse($pid){
        $this->IPEModel->reportAbuse($pid);
        redirect ('view/photo/'.$pid);
    }
    
    public function deleteImage($pid){
        $loggedIn=  $this->session->userdata('logged_in');
        if(!isset($loggedIn)){
            $loggedIn=FALSE;
        }
        if($loggedIn){
            if($this->IPEModel->isAdmin($this->session->userdata('id'))){
                $this->load->library('email');
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE; 
                $this->email->initialize($config);
                $this->email->from('indianph@indianphotographyedition.com', 'Indian Photography Edition');
                $this->email->to($this->IPEModel->getOwnerOfPicture($pid)->email); 
                $this->email->subject('Indian Photography Edition');
                $this->email->message("Your picture has been deleted for violating privacy policy. If you continue to post such pictures your account may be deleted  Thank You. ");  
                $this->email->send();
            }
            if($this->IPEModel->isOwnerOfPicture($pid,$this->session->userdata('id'))){
                
            }
            $this->IPEModel->deletePicture($pid);
            $this->template->write_view('content', 'successdelete',array(), TRUE);
            $this->template->render();      
        }
    }
    
    public function deleteAlbum($aid){
        $loggedIn=  $this->session->userdata('logged_in');
        if(!isset($loggedIn)){
            $loggedIn=FALSE;
        }
        if($loggedIn)
        $this->IPEModel->deleteAlbum($aid);
         redirect('/view/albums/'.$this->session->userdata('id'), 'refresh');
    }
    
    public function changeAlbumCover($aid){
        $data['aid']=$aid;
        $s=$this->IPEModel->getPicturesForUser($this->session->userdata('id'),0,-1,0);;
        $data['pictureData']=array();
        foreach ($s as $v)
            if($v->id==$aid)
            $data['pictureData'][]=$v;
        $this->template->write_view('content', 'changealbumcover',$data, TRUE);
        $this->template->render();  
    }

    public function changeAlbumCoverPic($aid,$pid){
        $this->IPEModel->changeAlbumCoverPic($aid,$pid);
        redirect('/view/albums/'.$this->session->userdata('id'), 'refresh');
    }
    //s@TODO



    //put your code here
}

?>
