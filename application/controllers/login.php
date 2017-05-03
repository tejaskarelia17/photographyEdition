<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Saldanhas
 */
class login extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        
            
    }
    
    public function index(){
        
        $logged_in = $this->session->userdata('logged_in');
        if(!isset($logged_in))
            $logged_in = FALSE;
        if($logged_in){
                 redirect('/welcome', 'refresh');
        }
        else{
             $data['error']=FALSE;
             
               $this->template->write_view('content', 'login', $data, TRUE);
    	      $this->template->render();
        }
    }
    
    public function logout(){
        $array_items = array('username'  => '','email'=>'','id' =>'','logged_in' => '');
        $this->session->unset_userdata($array_items); 
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    //AJAX
    public function loginfunc(){
        $logged_in = $this->session->userdata('logged_in');
        if(!isset($logged_in))
            $logged_in = FALSE;      
        
        if($logged_in){
                 redirect('/welcome', 'refresh');
        }
	$this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email Address','required');
        $this->form_validation->set_rules('pass','Password','required');
        
        
	if ($this->form_validation->run() == FALSE)
	{
            $data['error']=true;
               $this->template->write_view('content', 'login', $data, TRUE);
    	      $this->template->render();
	}
	else
	{
            
            $this->load->model('IPEModel');
            $res=$this->IPEModel->checkLogin($_POST['email'],$_POST['pass']);

            if($res!=""){
                $newdata = array(
                   'username'  => $res->username,
                   'email'     => $res->email,
                   'id'        =>$res->id,
                   'logged_in' => TRUE,
                   'noOfnotifications'=>$this->IPEModel->getNoOfNotifications($res->id),
                    'timestamp'=>date('Y-m-d h:i:s')
               );

                $this->session->set_userdata($newdata);
                 header('Location: ' . $_SERVER['HTTP_REFERER']);
               }
            else{
                               header('Location: ' . $_SERVER['HTTP_REFERER']);

            }
            
	}
    }
    
    public function registerdob(){
    	$this->template->write_view('content', 'reg1', array(), TRUE);
    	$this->template->render();
    }
    
    public function registertnc(){
    	
    	if(!$_POST) redirect('/login/registerdob', 'refresh');
    	$this->template->write_view('content', 'reg2', array(), TRUE);
    	$this->template->render();
    }
    
    public function register(){
    
        if(!$_POST) redirect('/login/registerdob', 'refresh');
        
    
    		
    
    		$this->load->helper('captcha');
    	
                 $vals = array(
        'img_path' => 'captcha/',
        'img_url' => base_url().'captcha/',
        );
                 // create captcha image
                $cap = create_captcha($vals);
                // store image html code in a variable
                $data['image'] = $cap['image'];
              
                // store the captcha word in a session
                $this->session->set_userdata('word', $cap['word']); 
    
    
        $this->template->write_view('content', 'signup', $data, TRUE);
    	$this->template->render();
    }
    
    public function verificationsuccess(){
        $data['text']="Your account has been verified. Thank You";
        $this->template->write_view('content', 'signupsuccess', $data, TRUE);
    	$this->template->render();
    }
    
    public function resetPass($uid){
        if($_GET['mainhash']=="AUB82y38bu924B"){
         if($_GET['permission']=="granted")
             $data['granted']=TRUE;
         else{
             $data['granted']=FALSE;
         }
        }
         
    }

    //AJAX
    public function registerfunc(){
        $this->load->model('IPEModel');
        $this->load->helper(array('form', 'url'));
	$this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        
        $this->form_validation->set_rules('email','Email Address','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('cpassword','Password Confirmation','required|matches[password]');

        $this->form_validation->set_rules('state','State','required');
        $this->form_validation->set_rules('city','City','required');
        
        $this->form_validation->set_rules('cap','CAPTCHA','required');
        
        $check=false;
        $checkUname=($this->IPEModel->validUsername($_POST['username']));
        $checkEmail=($this->IPEModel->validEmail($_POST['email']));
        if($this->input->post('terms')){
            $check=true;
            $this->form_validation->set_rules('terms', 'terms', 'required');
        }
        

	if ($this->form_validation->run() == FALSE || !$check || !$checkUname || !$checkEmail)
	{
            
            $data['errors']=  validation_errors();
            if(!$checkUname)$data['errors']="Invalid Username";
            if(!$checkEmail)$data['errors']="Invalid E-Mail";
            
            	$this->load->helper('captcha');
    	
                 $vals = array(
        'img_path' => 'captcha/',
        'img_url' => base_url().'captcha/',
        );
    
                 // create captcha image
                $cap = create_captcha($vals);
                // store image html code in a variable
                $data['image'] = $cap['image'];
              
                // store the captcha word in a session
                $this->session->set_userdata('word', $cap['word']); 

               $this->template->write_view('content', 'signup', $data, TRUE);
               $this->template->render();	
               
               }
	else
	{ 
	    $cap = $this->input->post('cap');
	    if($cap == $this->session->userdata('word')){
	    
            $user=  $this->input->post('username');
            $email=  $this->input->post('email');
            $password=  $this->input->post('password');
            $city=  $this->input->post('city');
            $state=  $this->input->post('state');
            if($this->IPEModel->add_user($user,$password,$email,$state,$city)){
                $data['text']='Registered Successfully. Please Login..!!';
                       $this->load->helper('url_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->library('email');
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE; 
            $this->email->initialize($config);

            $this->email->from('ashkazani@yahoo.com', 'Poloroid');
            $this->email->to($email); 
            $this->email->subject('Poloroid');
            $this->email->message('Welcome to Poloroid. Please click the link below to activate your account. http://localhost/123/index.php/login/verificationsuccess?code="'.md5($user). "   Thank You. ");  
            $this->email->send();
               $this->template->write_view('content', 'signupsuccess', $data, TRUE);
    	      $this->template->render();
    	    }
              else{
                echo "An error occured. We're sorry please try again in some time.";
            }
            } else{
                echo "INCORRECT CAPTCHA";
            }
	}
    }
    
    public function forgot(){
    	$this->template->write_view('content', 'forgot', array(), TRUE);
    	$this->template->render();
    }
    
    public function forgotpass(){
        $this->load->model('IPEModel');
    	
    	
    	if(!$this->IPEModel->validEmail($_POST['email'])){ 
    		$newpass=random_string('alnum', 10);
    	
    		$this->IPEModel->updatePass($_POST['email'],$newpass);
    	 
    	 	//die($newpass);
           	$data['text']='Please login to your account with the password you will receive by e-mail shortly.';
                $this->load->helper('url_helper');
        	$this->load->helper(array('form', 'url'));
        	$this->load->library('email');
        	
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE; 
            $this->email->initialize($config);

            $this->email->from('ashkazani@yahoo.com', 'Poloroid');
            $this->email->to($_POST['email']); 
            $this->email->subject('Poloroid');
            $this->email->message('Poloroid New Password : '.$newpass );  
            $this->email->send();
               $this->template->write_view('content', 'signupsuccess', $data, TRUE);
    	      $this->template->render();
    	    }
              else{
                echo "An error occured. We're sorry please try again in some time.";
            }
    }
}

?>
