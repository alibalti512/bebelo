<?php
class Api extends CI_Controller
{

    function __construct()
    {
	parent::__construct();
	$this->load->database();
	
       /*cache control*/
	$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	$this->output->set_header('Pragma: no-cache');
	}
	
	
	    function post_order(){
	            if($this->input->post('type')=="image") { 
	        
	        	$data['type']=$this->input->post('type');
				// $data['brand']=$this->input->post('brand');
				// $data['serial']=$this->input->post('serial');
				// $data['model']=$this->input->post('model');
				// $data['description']=$this->input->post('description');
				$data['user_id']=$this->input->post('user_id');
	            $this->db->insert('orders',$data);
				$insert_id=$this->db->insert_id();		
				
	        	  if(isset($_REQUEST['image'])){
                	   $base=$_REQUEST['image']; 
                	   
                    	$filename =$insert_id.'.png';
                    	$ndata['image_url']=base_url().'/uploads/order/'.$filename;
                    	$profile_link=base_url().'/uploads/order/'.$filename;
                    	  $binary=base64_decode($base);
                    	  header('Content-Type: bitmap; charset=utf-8');
                    	// Images will be saved under 'www/imgupload/uplodedimages' folder
                        $file = fopen($_SERVER['DOCUMENT_ROOT'].'/airtrade/uploads/order/'.$filename, 'wb');
                    	// Create File
                        fwrite($file, $binary);
                        fclose($file);
                        $this->db->where('order_id',$insert_id);
                        $this->db->update('orders',$ndata);
                        
	                    }
	               $order_count=$this->input->post('sparepartcount'); 
	               for($i=0;$i<$order_count;$i++){
	                   $k['quantity']=$this->input->post('quantity'.$i);
	                   $k['unit']=$this->input->post('unit'.$i);
	                   $k['partname']=$this->input->post('partname'.$i);
	                   $k['quantity']=$this->input->post('quantity'.$i);
	                   $k['order_id']=$insert_id;
	                   $this->db->insert('orders_detail',$k);
	                   
	               }
	                    

	                    
			$response['success']=1;

			$response['message']="Your order have been sucessfully Inserted";			
	        echo json_encode($response);
	        
	            }else{
	        
	        	$data['type']=$this->input->post('type');
				$data['brand']=$this->input->post('brand');
				$data['serial']=$this->input->post('serial');
				$data['model']=$this->input->post('model');
				// $data['description']=$this->input->post('description');
				$data['user_id']=$this->input->post('user_id');
	            $this->db->insert('orders',$data);
				$insert_id=$this->db->insert_id();		
				
	               $order_count=$this->input->post('sparepartcount'); 
	               for($i=0;$i<$order_count;$i++){
	                   $k['quantity']=$this->input->post('quantity'.$i);
	                   $k['unit']=$this->input->post('unit'.$i);
	                   $k['partname']=$this->input->post('partname'.$i);
	                   $k['quantity']=$this->input->post('quantity'.$i);
	                   $k['order_id']=$insert_id;
	                   $this->db->insert('orders_detail',$k);
	                   
	               }
	                    

	                    
			$response['success']=1;

			$response['message']="Your order have been sucessfully Inserted";			
	        echo json_encode($response);
	                
	            }
	
	    }
	    
function detail_order(){
    $order_id=$this->input->post('order_id');
    
    if(!empty($order_id)){	   
    $data['success']=1;
	$data['order_detail']=$this->db->where('order_id',$order_id)->get('orders_detail')->result_array();
    echo json_encode($data);    
            exit;
        
    }else{
	        		      $data['sucess']=1;
		    $data['msg']="Invalid Request";
	   echo json_encode($data);    
            exit;
       
	    }
    
    
    
    
    
}
function readytoaccept(){
    $order_id=$this->input->post('order_id');
    
    if(!empty($order_id)){	   
    $data['success']=1;
    $ck['order_status']=2;
    $this->db->where('order_id',$order_id)->update('orders',$ck);
	$data['msg']="your  request hass been approved successfully";
    echo json_encode($data);    
            exit;
        
    }else{
	        		      $data['sucess']=1;
		    $data['msg']="Invalid Request";
	   echo json_encode($data);    
            exit;
       
	    }
    
    
    
    
    
}



	    function my_order($param1){
	    $data['success']=1;
		$re=$this->db->where('user_id',$param1)->get('orders')->result_array();
 		
 		$sweete=array();
	
	
		foreach($re as $row){
		    $jan=array();
		    $jan['order_id']=$row['order_id'];
		    $jan['brand']=$row['brand'];
		    $jan['serial']=$row['serial'];
		    $jan['model']=$row['model'];
		    $jan['image_url']=$row['image_url'];
		    $jan['inserted_date']=$row['inserted_date'];
		   $jan['order_status']=$row['order_status'];
		    $jan['type']=$row['type'];
		    if($jan['order_status'] ==0){
		   $jan['quotation']=array(
		              'quotation_id'=>'',
		              'order_id'=>'',
		              'price'=>'',
		              'subtotal'=>'',
		              'gst'=>'',
		              'total'=>'',
		              'expired_time'=>''
		              );     
		    }else{
		      $zela  =$this->db->where('order_id',$jan['order_id'])->get('quotation')->row_array();
		      if(!empty($zela)){
		        $jan['quotation']=   $zela;  
		      }else{
		          $jan['quotation']=  
		          array(
		              'quotation_id'=>'',
		              'order_id'=>'',
		              'price'=>'',
		              'subtotal'=>'',
		              'gst'=>'',
		              'total'=>'',
		              'expired_time'=>''
		              );
		      }
		        
		        
		        
		    }
		    array_push($sweete,$jan);
		    
		}
		$data['return_data']=$sweete;
		
		
        echo json_encode($data);		
	    }
	    function my_quotaion($param1){
	        $data['success']=1;
	        $this->db->select('*')
	        ->where('orders.user_id',$param1)
         ->from('orders')
         ->join('quotation', 'orders.order_id = quotation.order_id','right');
         
        $query = $this->db->get()->result_array();
		$data['result']=$query;
		echo json_encode($data);
	    }
	    
	    
	    

	function parts_list(){
		$data['success']=1;
		$q=$this->db->select('parts_id,part_name,thumbnail')->get('parts')->result_array();
		$dataarray=array();
		foreach($q as $s){
		    $baby=array(
		        'parts_id' => $s['parts_id'],
		        'part_name' => $s['part_name'],
		        'thumbnail' => base_url().$s['thumbnail'],
		        );
		  array_push($dataarray,$baby);      
		    
		}
		$data['result']=$dataarray;
		
		echo json_encode($data);	
	}

    function verify($email){
	    $credential = array('cemail' => $email);
	 $query = $this->db->get_where('users', $credential);
	if ($query->num_rows() > 0) {

return 1;
    } else{
	return 0;
    }
    }
    
    function getnewdata(){
        
        
        $this->db->select('*');
        
        
        $this->db->where('weekDay','Monday');
        
        
    $this->db->from('barWeekDay bd'); 
  $this->db->join('barWeekDaydetail b', 'b.barWeekDay_id=bd.barWeekDay_id', 'left');
  $d['response']=$this->db->get()->result_array();
    echo json_encode($d);
    
    
        
        
    }
    
    
    function updatebarbottle($data=""){
    
        $check = $this->db->where('bar_id',$data['bar_id'])->get('barBottle')->result_array();
        
        if(!empty($check) && !empty($data)){
            $this->db->where('bar_id',$data['bar_id']);
            $this->db->update('barBottle', $this->input->post());
        
            $response['success']= '1';
		    $response['result']="record updated";		        
            echo json_encode($response);
        } else {
            $response['success']= '0';
		    $response['msg']="no record found";		        
            echo json_encode($response);
        }
    }
    
    
    
    function getallbarbottle($Userid=""){
    
    
        $x=  $this->db->get('users')->result_array();
      
        $info=array();
        foreach($x as $y){
            $flag="";
            $data=$this->db->where('bar_id',$y['id'])->get('barBottle')->row_array();
            if(!empty($data)){
                $bar['bar_id'] = $y['id'];
                $bar['bar_bottle_info']=$data;
                array_push($info,$bar);
            }
        }
      
        $response['success']= '1';
		$response['result']=$info;		        
        echo json_encode($response);
    }
    
    function getallbarweekday($Userid=""){
        $x=  $this->db->get('users')->result_array();
      
        $info=array();
        foreach($x as $y){
            $data=$this->db->where('bar_id',$y['id'])->get('barWeekDay')->row_array();
            if(!empty($data)){
                $bar['bar_id'] = $y['id'];
                $bar['bar_week_day']=$data;
                
                $data=$this->db->where('bar_id',$y['id'])->get('barWeekDaydetail')->row_array();
                $bar['bar_week_day_detail']=$data;
            
                array_push($info,$bar);
            }
        }
      
        $response['success']= '1';
		$response['result']=$info;		        
        echo json_encode($response);
    }
    
    
    function getallusers($Userid=""){
        $x=  $this->db->get('users')->result_array();
        $data = "";
        if(!empty($x)){
            $data = $x;
        }else{
            $data = "no data found"; 
        }
        $response['success']= '1';
		$response['result']=$x;		        
        echo json_encode($response);
    }
    
    
    
    
    
    function getallsstore($Userid=""){
    
    
      $x=  $this->db->get('users')->result_array();
      
      
      
      
      
      
      
      $info=array();
      foreach($x as $y){
          $flag="";
          $tatus=$this->db->where('bar_id',$y['id'])->where('user_id',$Userid)->get('bar_report')->row_array();
          if(!empty($tatus)){
           $flag  = $tatus['status'];
          }else{
             $flag="0"; 
          }
          
          
          $bar['bar_info']=$y;
          $bar['status']=$flag;
          array_push($info,$bar);
        
      }
      
      
      
                $response['success']= '1';
				$response['result']=$info	;		        
        				echo json_encode($response);
    }
    
    
    function getflag(){
       $info= $this->db->get('flagstatus')->row_array();
           $response['success']= '1';
				$response['result']=$info	;		        
        				echo json_encode($response);
    }
    function getsingle($id){
         $x=  $this->db->where('id',$id)->get('users')->row_array();
                $response['success']= '1';
				$response['result']=$x	;		        
        				echo json_encode($response);
    }
     function getsingleandroid($id){
         $d['barInfo']=  $this->db->where('id',$id)->get('users')->row_array();
         $d['barBottle']=  $this->db->where('bar_id',$id)->get('barBottle')->result_array();
            $lol=array();
          $weekDay=  $this->db->where('bar_id',$id)->get('barWeekDay')->result_array();
            foreach($weekDay as $wk){
                $c['weekDay']=$wk;
                $c['weekDaydetail']=$this->db->where('barWeekDay_id',$wk['barWeekDay_id'])->get('barWeekDaydetail')->result_array();
                array_push($lol,$c);
            }
            $d['weekinfoall']=$lol;
         
                $response['success']= '1';
				$response['result']=$d	;		        
        				echo json_encode($response);
    }
    
    function deleteaccount(){
$this->db->where('id',$this->input->post('id'))->delete('users');
                $response['success']= '1';
				$response['msg']="account has been removed"	;		        
        				echo json_encode($response);
        
    }
    
    function adduserinfo(){
       	$data['dob']= $this->input->post('dob');
       	$data['sex']= $this->input->post('sex');
       	$data['date']=date("Y-m-d");
       	  $this->db->insert('userinfo',$data);
       	  	$insert_id=$this->db->insert_id();	
        $response['success']= '1';
        $response['user_id']= $insert_id;
        echo json_encode($response);
    }
    
    function maindatarecord(){
        $date=date("Y-m-d");
        $ck['user_id']=$this->input->post('user_id');
        $ck['date']=$date;
        $this->db->insert('dateinfouser',$ck);
        
        
        $x=$this->db->where('date',$date)->get('dateinfo')->row_array();
        if(empty($x)){
            	$data['date']=$date;
            	$data['view']=1;
       	  $this->db->insert('dateinfo',$data);
        }else{
            $p['view']=$x['view']+1;
            $this->db->where('date',$date)->update('dateinfo',$p);
        }
          $response['success']= '1';
        echo json_encode($response);
    }
    function addreport(){
  
        $x=$this->db->where('user_id',$this->input->post('user_id'))->where('bar_id',$this->input->post('bar_id'))->get('bar_report')->row_array();
        if(empty($x)){
            	$data['bar_id']=$this->input->post('bar_id');
            	$data['status']=$this->input->post('status');
            	$data['user_id']=$this->input->post('user_id');
       	  $this->db->insert('bar_report',$data);
       	  
        }else{
            	$data['status']=$this->input->post('status');
           
            $this->db->where('bar_report_id',$x['bar_report_id'])->update('bar_report',$data);
        }
          $response['success']= '1';
        echo json_encode($response);
    }
      function updatestoreandroid(){
        $insert_id=$this->input->post('id');
        if($this->input->post('bname') !=""){
    	    	$data['bname']= $this->input->post('bname');
        }
            if($this->input->post('baddress') !=""){
		 		$data['baddress']= $this->input->post('baddress');
            }
                if($this->input->post('blat') !=""){
				$data['blat']= $this->input->post('blat');
                }
                    if($this->input->post('blng') !=""){
				$data['blng']= $this->input->post('blng');
                    }
                        if($this->input->post('cname') !=""){
				$data['cname']= $this->input->post('cname');				
                        }
                            if($this->input->post('cphone') !=""){
				$data['cphone']= $this->input->post('cphone');
                            }
                                if($this->input->post('bdetail') !=""){
				$data['bdetail']= $this->input->post('bdetail');	
                                }
                $data['Terraces']= $this->input->post('Terraces');				
				$data['Rooftops']= $this->input->post('Rooftops');
				$data['barSupliment']= $this->input->post('barSupliment');
				$data['barAnounce_date']= $this->input->post('barAnounce_date');
				$data['displayPrice']= $this->input->post('displayPrice');
				$data['barAnounce_data']= $this->input->post('barAnounce_data');	
			$data['freeTable_date']= $this->input->post('freeTable_date');
				$data['freeTable_freeTable']= $this->input->post('freeTable_freeTable');	
				  if(isset($_REQUEST['image'])){
                	   $base=$_REQUEST['image']; 
                	   
                    	$filename =$insert_id.'.png';
                    	$data['imge_url']=base_url().'/uploads/profile/'.$filename."?".rand();
                    	$profile_link=base_url().'/uploads/profile/'.$filename;
                    	  $binary=base64_decode($base);
                    	  header('Content-Type: bitmap; charset=utf-8');
                    	// Images will be saved under 'www/imgupload/uplodedimages' folder
                        $file = fopen($_SERVER['DOCUMENT_ROOT'].'/perica/uploads/profile/'.$filename, 'wb');
                    	// Create File
                        fwrite($file, $binary);
                        fclose($file);
                       
                        
	                    }
	                     $this->db->where('id',$insert_id);
                        $this->db->update('users',$data);
                        
                        $this->db->where('bar_id',$insert_id)->delete('barBottle');
                        
                           $barbottle_size= $this->input->post('barbottle_size');	
			    for($i=0;$i<$barbottle_size;$i++){
			    $data1['drinkImage']= $this->input->post('drinkImage'.$i);				
				$data1['drinkName']= $this->input->post('drinkName'.$i);
				$data1['drinkPrice']= $this->input->post('drinkPrice'.$i);
			    $data1['bar_id']= $insert_id;    
			    $this->db->insert('barBottle',$data1);
			   
			    }	
			    $this->db->where('bar_id',$insert_id)->delete('barWeekDay');
			    $this->db->where('bar_id',$insert_id)->delete('barWeekDaydetail');
			    
			       $weekday_size= $this->input->post('weekday_size');	
			    for($i=0;$i<$weekday_size;$i++){
			    $data2['weekDay']= $this->input->post('weekDay'.$i);				
			    $data2['bar_id']= $insert_id;    
			   $this->db->insert('barWeekDay',$data2);
			    $weekday_id=$this->db->insert_id();	
			        $innerdaycount=$this->input->post('weekDay'.$i.'count');
			        for($j=0;$j<$innerdaycount;$j++){
			             $data3['svalue']= $this->input->post('weekDay'.$i.'_sValue'.$j);
			             $data3['evalue']= $this->input->post('weekDay'.$i.'_eValue'.$j);
			             $data3['bar_id']= $insert_id;   
			             $data3['barWeekDay_id']= $weekday_id;
			               $this->db->insert('barWeekDaydetail',$data3);
			             
			        }
			        
			    
			   
			    }	
			
                        
                        
                        
                        
                        
                $response['success']= '1';
				$response['result']=$this->db->get_where('users',array('id' => $insert_id ))->row_array();
				$response['message']="You have sucessfully Profile Updated";			        
        				echo json_encode($response);
    }
    
    function updatestore(){
        $insert_id=$this->input->post('id');
        if($this->input->post('bname') !=""){
    	    	$data['bname']= $this->input->post('bname');
        }
            if($this->input->post('baddress') !=""){
		 		$data['baddress']= $this->input->post('baddress');
            }
                if($this->input->post('blat') !=""){
				$data['blat']= $this->input->post('blat');
                }
                    if($this->input->post('blng') !=""){
				$data['blng']= $this->input->post('blng');
                    }
                        if($this->input->post('cname') !=""){
				$data['cname']= $this->input->post('cname');				
                        }
                            if($this->input->post('cphone') !=""){
				$data['cphone']= $this->input->post('cphone');
                            }
                                if($this->input->post('bdetail') !=""){
				$data['bdetail']= $this->input->post('bdetail');	
                                }
				  if(isset($_REQUEST['image'])){
                	   $base=$_REQUEST['image']; 
                	   
                    	$filename =$insert_id.'.png';
                    	$data['imge_url']=base_url().'/uploads/profile/'.$filename."?".rand();
                    	$profile_link=base_url().'/uploads/profile/'.$filename;
                    	  $binary=base64_decode($base);
                    	  header('Content-Type: bitmap; charset=utf-8');
                    	// Images will be saved under 'www/imgupload/uplodedimages' folder
                        $file = fopen($_SERVER['DOCUMENT_ROOT'].'/perica/uploads/profile/'.$filename, 'wb');
                    	// Create File
                        fwrite($file, $binary);
                        fclose($file);
                       
                        
	                    }
	                     $this->db->where('id',$insert_id);
                        $this->db->update('users',$data);
                $response['success']= '1';
				$response['result']=$this->db->get_where('users',array('id' => $insert_id ))->row_array();
				$response['message']="You have sucessfully Profile Updated";			        
        				echo json_encode($response);
    }
    
    function app_login(){
        
        	    	$user_email=$this->input->post('user_email');
			$user_password=$this->input->post('user_password');
			$flag=$this->verifyUser($user_email,$user_password);
			if($flag==0){
			$response['success']=0;
            	$response['result']="";
	    	$response['message']="Invalid User";
			}
			else{
			$response['success']=1;
	        $response['result']=$flag;
	        	$response['message']="You have sucessfully Login";
	
			}
	
		echo json_encode($response);

    }
    
    		function app_register(){
				$data['bname']= $this->input->post('bname');
				$data['baddress']= $this->input->post('baddress');
				$data['blat']= $this->input->post('blat');
				$data['blng']= $this->input->post('blng');
				$data['cname']= $this->input->post('cname');				
				$data['cemail']= $this->input->post('cemail');
				$data['cpassword']= $this->input->post('cpassword');
				$data['cphone']= $this->input->post('cphone');
				$data['bdetail']= $this->input->post('bdetail');	
				$data['Terraces']= $this->input->post('Terraces');				
				$data['Rooftops']= $this->input->post('Rooftops');
				$data['displayPrice']= $this->input->post('displayPrice');
				$data['barSupliment']= $this->input->post('barSupliment');
				$data['barAnounce_date']= $this->input->post('barAnounce_date');
				$data['barAnounce_data']= $this->input->post('barAnounce_data');	
			$data['freeTable_date']= $this->input->post('freeTable_date');
				$data['freeTable_freeTable']= $this->input->post('freeTable_freeTable');	
		
				$flag=$this->verify($data['cemail']);
		        if($flag == '0'){
				$this->db->insert('users',$data);
				$insert_id=$this->db->insert_id();		
			
				  if(isset($_REQUEST['image'])){
                	   $base=$_REQUEST['image']; 
                	   
                    	$filename =$insert_id.'.png';
                    	$ndata['imge_url']=base_url().'/uploads/profile/'.$filename;
                    	$profile_link=base_url().'/uploads/profile/'.$filename;
                    	  $binary=base64_decode($base);
                    	  header('Content-Type: bitmap; charset=utf-8');
                    	// Images will be saved under 'www/imgupload/uplodedimages' folder
                        $file = fopen($_SERVER['DOCUMENT_ROOT'].'/perica/uploads/profile/'.$filename, 'wb');
                    	// Create File
                        fwrite($file, $binary);
                        fclose($file);
                        $this->db->where('id',$insert_id);
                        $this->db->update('users',$ndata);
                        
	                    }
	           $barbottle_size= $this->input->post('barbottle_size');	
			    for($i=0;$i<$barbottle_size;$i++){
			    $data1['drinkImage']= $this->input->post('drinkImage'.$i);				
				$data1['drinkName']= $this->input->post('drinkName'.$i);
				$data1['drinkPrice']= $this->input->post('drinkPrice'.$i);
			    $data1['bar_id']= $insert_id;    
			    $this->db->insert('barBottle',$data1);
			   
			    }	
			    
			    
			       $weekday_size= $this->input->post('weekday_size');	
			    for($i=0;$i<$weekday_size;$i++){
			    $data2['weekDay']= $this->input->post('weekDay'.$i);				
			    $data2['bar_id']= $insert_id;    
			   $this->db->insert('barWeekDay',$data2);
			    $weekday_id=$this->db->insert_id();	
			        $innerdaycount=$this->input->post('weekDay'.$i.'count');
			        for($j=0;$j<$innerdaycount;$j++){
			             $data3['svalue']= $this->input->post('weekDay'.$i.'_sValue'.$j);
			             $data3['evalue']= $this->input->post('weekDay'.$i.'_eValue'.$j);
			             $data3['bar_id']= $insert_id;   
			             $data3['barWeekDay_id']= $weekday_id;
			               $this->db->insert('barWeekDaydetail',$data3);
			             
			        }
			        
			    
			   
			    }	
			
				$response['success']= '1';
				$response['result']=$this->db->get_where('users',array('id' => $insert_id ))->row_array();
				$response['message']="You have sucessfully Registerd";			
				}
				else
				{
                    $response['success']= '0';
                    $response['error']= '1';
                    $response['message']= "user is already register againest this email";
				}
				echo json_encode($response);
			}
    
		   function users($param1){
			   if($param1=="app_register"){
				$id=0;
				$data['name']=$this->input->post('user_name');
				$data['email']=$this->input->post('user_email');
				$data['password']=$this->input->post('user_password');
				$data['phone']=$this->input->post('phone');
				$data['companey_name']=$this->input->post('companey');
				$data['shipping_address']=$this->input->post('shipping_address');
				$data['suburb']=$this->input->post('suburb');
				$data['postcode']=$this->input->post('postcode');
				
				//
				
			
		$flag=$this->verify($data['email']);
		if($flag==0){
			//////////////////role for normaluser/////
		
				$this->db->insert('users',$data);
				$insert_id=$this->db->insert_id();		
			
						
			

							$response['success']=1;
							$response['result']=$this->db->get_where('users',array('user_id' => $insert_id ))->row_array();
	
							$response['message']="You have sucessfully Registerd";			
				}
					else{
							$response['success']=0;
							$response['error']=1;
							$response['message']="user is already register againest this email";
						}

			}
			else if($param1=="app_login"){
			
			    	$user_email=$this->input->post('user_email');
			$user_password=$this->input->post('user_password');
			$flag=$this->verifyUser($user_email,$user_password);
			if($flag==0){
			$response['success']=0;
            	$response['result']="";
	    	$response['message']="Invalid User";
			}
			else{
			$response['success']=1;
	        $response['result']=$flag;

	
	
	
	$rdata['msg']="You have sucessfully Login";
			}
			}else if($param1=="update_tokken"){
			    	$data['token_id']=$_REQUEST['token_id'];
	$this->db->where('user_id',$_REQUEST['user_id']);
$this->db->update('users',$data);
	$response['success']=1;
        $response['message']="Token Update Sucessfully.";
			}else  if($param1=="update_profile"){
			       
				$id=0;
				
				 $data['name']=$this->input->post('user_name');
				$data['phone']=$this->input->post('phone');
				$data['companey_name']=$this->input->post('companey');
				$data['shipping_address']=$this->input->post('shipping_address');
				$data['suburb']=$this->input->post('suburb');
				$data['postcode']=$this->input->post('postcode');
				$insert_id=$this->input->post('user_id');
			
	            $this->db->where('user_id',$insert_id);
				$this->db->update('users',$data);
			
			
						
			

							$response['success']=1;
							$response['result']=$this->db->get_where('users',array('user_id' => $insert_id ))->row_array();
	
							$response['message']="You have sucessfully update profile";			
				
				

			}
			
		echo json_encode($response);

		}
		
      function verifyUser($email,$passeord){
   	  $credential = array('cemail' => $email,'cpassword'=>$passeord);
	 $query = $this->db->get_where('users', $credential)->row_array();
	 if(!empty($query)){
	 	return $query;
	 }else{
	 	return 0;
	 }
}

}
