<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function bar()
	{
	   if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }

		$this->load->view('home');
	}

//
	public function viewbar($param1)
	{
	   if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
        
$d['id']=$param1;
		$this->load->view('home2',$d);
	}

	public function index()
	{
		$this->load->view('login');
	}





public function verfiylogin(){
            $email = $_POST["email"];
        $password = $_POST["password"];
        if($email=="admin@example.com" && $password=="1234"){
                $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', '1');
        
            $this->session->set_userdata('name', 'Mr.Admin');
            $this->session->set_userdata('login_type', 'admin');
            
      $this->session->set_flashdata('flash_message' , ('Admin Login Succesffuly. '));
      redirect(base_url().'site/bar/');
                        
        }else{
      $this->session->set_flashdata('error_flash_message' , ('Invalid Login Credientails. '));
      redirect(base_url().'site/');
            
        }
        
        
}


	public function chanbge($id)
	{
	    if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
	    $data['id']=$id;
		$this->load->view('lyrics',$data);
	}

	public function changepassword($id)
	{
	    if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
        $data['id']=$id;
		$this->load->view('addmusic',$data);
	}
	
	public function updaqtepassword($id){
	    
	    $d["cpassword"]=$this->input->post('duration');
	    $this->db->where('id',$id)->update('users',$d);
	    
	  $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
      redirect(base_url().'site/bar/');  
	    
	    
	}
	
	function deleteuser($id){
	    
	   // $d["cpassword"]=$this->input->post('duration');
	    $this->db->where('id',$id)->delete('users');
	    
	  $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
      redirect(base_url().'site/bar/');  
	    
	    
	}
	public function editlyrics($id){
	    if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
	    $data['id']=$id;
	    $this->load->view('editmsic',$data);
	}
	

	public function addcategory()
	{
	    if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
		$this->load->view('addcategory');
	}
	
	function adddatacategory(){
	     $data['cat_name']=$this->input->post('cat_name');
      $this->db->insert('categories',$data);
      $insert_id = $this->db->insert_id();
      
      if( move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/cat/' . $insert_id . '.jpg')){
      $ndata['cat_imgurl']=base_url().'uploads/cat/' . $insert_id . '.jpg';
      $this->db->where('id',$insert_id);
      $this->db->update('categories',$ndata);
      }
      
      $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
      redirect(base_url().'site/addcategory/');

	}
	function deletecat($id){
        $this->db->where('cat_parrent_id',$id);
      $this->db->delete('categories');    
      $this->db->where('id',$id);
      $this->db->delete('categories');
	      $this->session->set_flashdata('flash_message' , ('Data Removed Successfully'));
      redirect(base_url().'site/categories/');

	    
	}
	//deletesubcat
	
		function deletesubcat($id){
        $this->db->where('cat_parrent_id',$id);
      $this->db->delete('categories');    
      $this->db->where('id',$id);
      $this->db->delete('categories');
	      $this->session->set_flashdata('flash_message' , ('Data Removed Successfully'));
      redirect(base_url().'site/subcategories/');

	    
	}
	//editdatamusic
	function editdatamusic($id){
	     $data['cat_id']=$this->input->post('cat_id');
	     $data['title']=$this->input->post('title');
	     $data['duration']=$this->input->post('duration');
	     $data['artist_name']=$this->input->post('artist_name');
	     $data['lyricsa']=$this->input->post('lyricsa');
	     $data['lyricesc']=$this->input->post('lyricesc');
	     $data['lyricseng']=$this->input->post('lyricseng');

      $insert_id = $id;
      
      if( move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/song/' . $insert_id . '.jpg')){
      $data['lyrics_image_url']=base_url().'uploads/song/' . $insert_id . '.jpg';
      
      }
       if( move_uploaded_file($_FILES['songfile']['tmp_name'], 'uploads/files/' . $_FILES['songfile']['name'])){
      $data['media_file']=base_url().'uploads/files/' . $_FILES['songfile']['name'];
          }
      $this->db->where('id',$insert_id);
      $this->db->update('lyrics',$data);
      $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
      redirect(base_url().'site/editlyrics/'.$id);
	}

	
	function adddatamusic(){
	     if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
	     $data['cat_id']=$this->input->post('cat_id');
	     $data['title']=$this->input->post('title');
	     $data['duration']=$this->input->post('duration');
	     $data['artist_name']=$this->input->post('artist_name');
	     $data['lyricsa']=$this->input->post('lyricsa');
	     $data['lyricesc']=$this->input->post('lyricesc');
	     $data['lyricseng']=$this->input->post('lyricseng');
      $this->db->insert('lyrics',$data);
      $insert_id = $this->db->insert_id();
      
      if( move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/song/' . $insert_id . '.jpg')){
      $ndata['lyrics_image_url']=base_url().'uploads/song/' . $insert_id . '.jpg';
      $this->db->where('id',$insert_id);
      $this->db->update('lyrics',$ndata);
      }
       if( move_uploaded_file($_FILES['songfile']['tmp_name'], 'uploads/files/' . $_FILES['songfile']['name'])){
      $ndata['media_file']=base_url().'uploads/files/' . $_FILES['songfile']['name'];
      $this->db->where('id',$insert_id);
      $this->db->update('lyrics',$ndata);
      }
      
      $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
      redirect(base_url().'site/addmusic/');
	}
	
	
	function deletelyrics($id){
	    if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
	    $this->db->where('id',$id);
      $this->db->delete('lyrics');

      
            $this->session->set_flashdata('flash_message' , ('Data Removed Successfully'));
      redirect(base_url().'site/addmusic/');
	}

	public function addsubcategory()
	{
	    if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
		$this->load->view('addsubcategory');
	}

  function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url().'site', 'refresh');
    }
	public function analytics()
	{
	    $day=date("Y-m-d");
	    $startday=date('Y-m-d', strtotime('-1 days'));
	    $last7day=date('Y-m-d', strtotime('-7 days'));
	     $lastmonday=date('Y-m-d', strtotime('-30 days'));

		$data['today']=$this->db->select('userinfo_id')->where('date',$day)->from('userinfo')->count_all_results();
		$data['sday']=$this->db->select('userinfo_id')->where('date>=',$last7day)->where('date<=',$startday)->from('userinfo')->count_all_results();
		$data['monthday']=$this->db->select('userinfo_id')->where('date>=',$lastmonday)->where('date<=',$startday)->from('userinfo')->count_all_results();
		$data['male']=$this->db->select('userinfo_id')->where('sex','male')->from('userinfo')->count_all_results();
	    $data['female']=$this->db->select('userinfo_id')->where('sex','female')->from('userinfo')->count_all_results();	
	    $data['none']=$this->db->select('userinfo_id')->where('sex','none')->from('userinfo')->count_all_results();	
		$data['todayview']=$this->db->select('view')->where('date',$day)->from('dateinfo')->get()->row_array();
		$data['sdayview']=$this->db->select('view')->where('date>=',$last7day)->where('date<=',$startday)->from('dateinfo')->get()->row_array();;
		$data['monthdayview']=$this->db->select('view')->where('date>=',$lastmonday)->where('date<=',$startday)->from('dateinfo')->get()->row_array();;
		$data['userdata']=$this->db->select('*')->from('userinfo')->get()->result_array();
		
		$this->load->view('analytics',$data);
	
	    
	    
	}
	
	

	public function filter()
	{
	    if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
        if($this->input->get('startdate') !="" && $this->input->get('end_date') != ""){
     
       $startday =  $this->input->get('startdate');
       $last7day =  $this->input->get('end_date'); 
        	
        	
        //	$data['userdata']=$this->db->select('*')->from('userinfo')->get()->result_array();
           $this->db->select('*,dateinfouser.date as ldate')
           ->where('dateinfouser.date>=',$startday)->where('dateinfouser.date<=',$last7day)
           ->order_by('dateinfouser.date')
         ->from('dateinfouser')
         ->join('userinfo', 'dateinfouser.user_id = userinfo.userinfo_id');
$result = $this->db->get();
            	$data['userdata']=$result->result_array();
            $data['startdate']=$startday;
            $data['end_date']=$last7day;
        }else{
            $this->db->select('*,dateinfouser.date as ldate')->order_by('dateinfouser.date')
         ->from('dateinfouser')
         ->join('userinfo', 'dateinfouser.user_id = userinfo.userinfo_id');
$result = $this->db->get();
            	$data['userdata']=$result->result_array();
            $data['startdate']="";
            $data['end_date']="";
            
        }
        
        
        
        
        
        
		$this->load->view('filter',$data);
	}


	public function editcat($id)
	{
	    if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
	    $s['id']=$id;
		$this->load->view('editcat',$s);
	}
	public function editdatacategory($id){
	      $data['cat_name']=$this->input->post('cat_name');

      $insert_id = $id;
      
      if( move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/cat/' . $insert_id . '.jpg')){
      
      $data['cat_imgurl']=base_url().'uploads/cat/' . $insert_id . '.jpg';
      

      }
            $this->db->where('id',$id);
      $this->db->update('categories',$data);
      
      $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
      
      
      redirect(base_url().'site/editcat/'.$id);
	}
	
	

	public function subcategories()
	{
	    if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
		$this->load->view('subcategories');
	}
	
	public function editdatasubcategory($id){
	      $data['cat_name']=$this->input->post('cat_name');
	    $data['cat_parrent_id']=$this->input->post('cat_parrent_id');
      $insert_id = $id;
      
      if( move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/cat/' . $insert_id . '.jpg')){
      
      $data['cat_imgurl']=base_url().'uploads/cat/' . $insert_id . '.jpg';
      

      }
            $this->db->where('id',$id);
      $this->db->update('categories',$data);
      
      $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
      
      
      redirect(base_url().'site/subcategories/');
	}
	
 function adddatasubcategory(){
	     if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
	     $data['cat_name']=$this->input->post('cat_name');
	    $data['cat_parrent_id']=$this->input->post('cat_parrent_id');
      $this->db->insert('categories',$data);
      $insert_id = $this->db->insert_id();
      
      if( move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/cat/' . $insert_id . '.jpg')){
      $ndata['cat_imgurl']=base_url().'uploads/cat/' . $insert_id . '.jpg';
      $this->db->where('id',$insert_id);
      $this->db->update('categories',$ndata);
      }
      
      $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
      redirect(base_url().'site/addsubcategory/');

	}
	
	public function editsubcat($id)
	{
if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'site', 'refresh');
        }
	    $d['id']=$id;
	    
		$this->load->view('editsubcat',$d);
	}
}
