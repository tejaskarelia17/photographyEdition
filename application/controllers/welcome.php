<title>Red-Eye Photography</title>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
                $this->template->write_view('content', 'index', array(), TRUE); 
                $this->template->render();
	}
        
        public function about()
	{
                $this->template->write_view('content', 'about', array(), TRUE); 
                $this->template->render();
	}
        public function privacy()
	{
                $this->template->write_view('content', 'Privacy', array(), TRUE); 
                $this->template->render();
	}
        public function terms()
	{
                $this->template->write_view('content', 'Terms', array(), TRUE); 
                $this->template->render();
	}
        public function contact()
	{
                $this->template->write_view('content', 'Contact', array(), TRUE); 
                $this->template->render();
	}
	
	public function cform()
	{
                $this->template->write_view('content', 'contactform', array(), TRUE); 
                $this->template->render();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */