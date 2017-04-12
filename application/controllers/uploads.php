<?php   

class uploads extends CI_Controller{

    
    function __construct() {
        parent::__construct();
        //redirect to login
        $loggedIn=  $this->session->userdata('logged_in');
        if(!isset($loggedIn)){
            redirect('/welcome', 'refresh');
        }
        if(!$loggedIn){
             redirect('/welcome', 'refresh');
        }
       $this->load->model('IPEModel');
    }

    public function index(){
        $data['categories']=$this->IPEModel->getCategories();
        $data['albums']=$this->IPEModel->getAlbums($this->session->userdata('id'));
        $this->template->write_view('content', 'upload', $data, TRUE);
    	$this->template->render();
    }
    
    public function editImage($id){
    	if(!$this->IPEModel->isOwnerOfPicture($id,$this->session->userdata('id'))){
    		redirect ('welcome');
    	}
    	
    	$data['picture']= $this->IPEModel->getPicture($id);
    	$data['album_id']= $this->IPEModel->getAlbumsIDfromPicID($id);
    
        $data['categories']=$this->IPEModel->getCategories();
        $data['albums']=$this->IPEModel->getAlbums($this->session->userdata('id'));
        $this->template->write_view('content', 'edit_upload', $data, TRUE);
    	$this->template->render();    
    }
    
    public function formsubmit2(){
    
    	//die($_POST['cropdata']);
        $data['error']="";

        
        $arrData=  explode(',',$_POST['cropdata']);
        $source_image = './uploads/images/'.$_POST['filename'];
        $target_image = './uploads/images/thumbs/'.$_POST['filename'];
        $crop_area = array('top' => $arrData[1], 'left' => $arrData[0], 'height' =>$arrData[3]-$arrData[1], 'width' => $arrData[2]-$arrData[0]);

        $this->cropImage($source_image, $target_image, $crop_area);
       
        $config2['image_library'] = 'imagemagick';
        $config2['library_path'] = '/usr/bin';
        
         $config2['source_image'] = './uploads/images/thumbs/'.$_POST['filename'];
        $config2['width'] = 300;
        $config2['height']=300;
    $this->load->library('image_lib', $config2); 
    if (!$this->image_lib->resize())
        {
            die($this->image_lib->display_errors());
        }

   // $this->image_lib->initialize($config);
            if(strlen($_POST['title'])==0)$data['error']="You must include a title";
            if(strlen($_POST['category'])==0)$data['error'].="You must include a category";
            if(strlen($data['error'])){
                die($data['error']);
            }
            if($_POST['albums']==-1){
                 $albumID=$this->IPEModel->add_album($_POST['albumText'],$this->session->userdata('id'));
            }
            else{
                 $albumID=$_POST['albums'];
            } 
		$this->IPEModel->editPicture($_POST['picture_id'],$this->session->userdata('id'),$_POST['title'],$_POST['description'],$_POST['category'],$_POST['camera'],$albumID);
           		
           redirect('/view/photo/'.$_POST['picture_id']);
    }
    
    public function formsubmit(){
        $data['error']="";

        
        $arrData=  explode(',',$_POST['cropdata']);
        /*$config['image_library'] = 'imagemagick';
        $config['library_path'] = '/usr/bin';
        $config['source_image'] = './uploads/images/'.$_POST['filename'];
        $config['new_image'] = './uploads/images/thumbs/'.$_POST['filename'];
            $config['x_axis']=$arrData[0];$config3['x_axis']=$arrData[0];
            $config['y_axis']=$arrData[1];
            $config['width']=$arrData[2]-$arrData[0];
            $config['height']=;

        
        $config['maintain_ratio'] = FALSE;
        $config['dynamic_output'] = FALSE;
        $this->load->library('image_lib', $config); 
        if(!$this->image_lib->crop()) {
            echo $this->image_lib->display_errors();
       }*/
        $source_image = './uploads/images/'.$_POST['filename'];
        $target_image = './uploads/images/thumbs/'.$_POST['filename'];
        $crop_area = array('top' => $arrData[1], 'left' => $arrData[0], 'height' =>$arrData[3]-$arrData[1], 'width' => $arrData[2]-$arrData[0]);

        $this->cropImage($source_image, $target_image, $crop_area);
       
        $config2['image_library'] = 'imagemagick';
        $config2['library_path'] = '/usr/bin';
        
         $config2['source_image'] = './uploads/images/thumbs/'.$_POST['filename'];
        $config2['width'] = 300;
        $config2['height']=300;
    $this->load->library('image_lib', $config2); 
    if (!$this->image_lib->resize())
        {
            die($this->image_lib->display_errors());
        }

   // $this->image_lib->initialize($config);
            if(strlen($_POST['title'])==0)$data['error']="You must include a title";
            if(strlen($_POST['category'])==0)$data['error'].="You must include a category";
            if(strlen($data['error'])){
                die($data['error']);
            }
            if($_POST['albums']==-1){
               $albumID=$this->IPEModel->add_album($_POST['albumText'],$this->session->userdata('id'));
            }
            else{
                 $albumID=$_POST['albums'];
           }
           $pod=$this->IPEModel->addPicture($this->session->userdata('id'),$_POST['title'],$_POST['description'],$_POST['filename'],$_POST['category'],$_POST['camera'],$albumID,  explode(',', $_POST['tags']));
           redirect('/view/photo/'.$pod);
    }
    
    function cropImage($source_image, $target_image, $crop_area)
{
    // detect source image type from extension
    $source_file_name = basename($source_image);
    $source_image_type = substr($source_file_name, -3, 3);
    
    // create an image resource from the source image  
    switch(strtolower($source_image_type))
    {
        case 'jpg':
            $original_image = imagecreatefromjpeg($source_image);
            break;
            
        case 'gif':
            $original_image = imagecreatefromgif($source_image);
            break;

        case 'png':
            $original_image = imagecreatefrompng($source_image);
            break;    
        
        default:
            trigger_error('cropImage(): Invalid source image type', E_USER_ERROR);
            return false;
    }
    
    // create a blank image having the same width and height as the crop area
    // this will be our cropped image
    $cropped_image = imagecreatetruecolor($crop_area['width'], $crop_area['height']);
    
    // copy the crop area from the source image to the blank image created above
    imagecopy($cropped_image, $original_image, 0, 0, $crop_area['left'], $crop_area['top'], 
              $crop_area['width'], $crop_area['height']);
 	
    // detect target image type from extension
    $target_file_name = basename($target_image);
    $target_image_type = substr($target_file_name, -3, 3);
    
    // save the cropped image to disk
    switch(strtolower($target_image_type))
    {
        case 'jpg':
            imagejpeg($cropped_image, $target_image, 100);
            break;
            
        case 'gif':
            imagegif($cropped_image, $target_image);
            break;

        case 'png':
            imagepng($cropped_image, $target_image, 0);
            break;    
        
        default:
            trigger_error('cropImage(): Invalid target image type', E_USER_ERROR);
            imagedestroy($cropped_image);
            imagedestroy($original_image);
            return false;
    }
    
    // free resources
    imagedestroy($cropped_image);
    imagedestroy($original_image);
    
    return true;
}
    
    
    public function upload(){
                $config['upload_path'] = './uploads/images';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']=0;
                $config['overwrite']=FALSE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload()){
			$data['error'] = array('uperror' => $this->upload->display_errors());
                        $data['owner']=true;
                        echo "E".$data['error']['uperror'];
		}
		else{
            $data = $this->upload->data();
            
            $newHeight=0;
            
            $origWidth = $data['image_width'];
            $origHeight = $data['image_height'];
            
            if($origWidth>1024){
            $newWidth = 1024;
            $newHeight = $newWidth*$origHeight/$origWidth;
            }else{
            $newWidth = $origWidth;
            $newHeight = $newWidth*$origHeight/$origWidth; 
            }
            
            if($newHeight>1024){
            $newHeight = 1024;
            $newWidth = $newHeight*$origWidth/$origHeight;
            }
            
                          
            
            
            $resize = array(
                'image_library'=>'imagemagick',
                'library_path' => '/usr/bin',
                'source_image'=>'./uploads/images/'.$data['file_name'],
                'create_thumb' => FALSE,
                'maintain_ratio'=>TRUE,
                'quality' => '70%',
                'width'=>$newWidth,
                'height'=>$newHeight
            );
            $this->load->library('image_lib', $resize); 
           $data['image_width']=$newWidth;
          $data['image_height']=$newHeight;
            if(!$this->image_lib->resize());
                  echo "S".json_encode($data);
		}
	/*
		$resize = array(
                                'image_library'=>'imagemagick',
                   		'library_path' => '/usr/bin',
                          	'source_image'=>'./uploads/images/'.$data['file_name'],
                            	'create_thumb' => FALSE,
                            	'maintain_ratio'=>TRUE,
                            	'quality' => '70%',
                            	'width'=>1024
                        	);
	            $this->load->library('image_lib', $resize); 
	            $this->image_lib->resize();
	           }
	 */
    }
    
    public function displayUserImages(){
        $data['images']=$this->IPEModel->getPicturesForUser($this->session->userdata('id'),0,5);
        $this->load->view('imagesForUpload',$data);
    }
    
    public function deleteImage($id){
        $this->load->helper('file');
        $getLoc=$this->IPEModel->getPicture($id)->location;
        delete_files("./uploads/images/$getLoc");
        $this->IPEModel->deletePicture($id);
        $this->displayUserImages();
    }
}
?>
