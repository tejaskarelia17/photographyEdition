<title>Red-Eye Photography</title>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categories
 *
 * @author Saldanhas
 */
class categories extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Ipemodel');
    }
    function index(){
      $categories=$this->Ipemodel->getCategories();
      $data=array();
      $limit=4;
      $count=0;
      foreach ($categories as $category) {
          $data['name'][$count]=$category->name;
          $data['id'][$count]=$category->id;
          $data['pictures'][$count]=$this->Ipemodel->getPicturesForCategory($category->name,$limit,0);
          $count++;
      }
      $this->template->write_view('content', 'categories',$data, TRUE);
      $this->template->render();
    }
    
    function loadCategory($categoryName,$page=1){
        $categoryName=utf8_decode(urldecode($categoryName));
        $limit=200;
        $data['images']=$this->Ipemodel->getPicturesForCategory($categoryName,$limit,($page-1)*$limit);
        
        $data['categoryName']=$categoryName;
        for($i=0;$i<count($data['images']);$i++){
            $a=$this->Ipemodel->getStar($data['images'][$i]->id);
        $data['images'][$i]->stars=  round($a/2);
        }
        $data['page']=$page;
        $data['categoryID']=$this->Ipemodel->getCategoryId($categoryName);
        $this->template->write_view('content', 'category',$data, TRUE);
        $this->template->render();
    }
}

?>
