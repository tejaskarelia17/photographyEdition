<title>Red-Eye Photography</title>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class search extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('IPEModel');
    }
    
    function index(){
        $s['search']=$_GET['search'];
        $s['array']=$this->IPEModel->searchPictures($s['search']);
        $s['users']=$this->IPEModel->searchUsers($s['search']);
        $t=$this->IPEModel->searchTags($s['search']);
        foreach($t as $row){ 
            $dupe=FALSE;
            foreach($s['array'] as $rows){ 
                if($row->id == $rows->id)$dupe=TRUE;
            }
            if(!$dupe)
            $s['array'][]=$row; 
             //array_push($row,"string".i++);
            }
            $this->template->write_view('content','search', $s, TRUE);
       $this->template->render();
    }
    
}
?>
