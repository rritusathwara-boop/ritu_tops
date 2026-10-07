<?php
include_once('model.php');  // 1 model page load

class control extends model{  // 2 model class extends
	
	function __construct(){
		
	    session_start();	
		
		model::__construct();  // 3 call model __construct for connectivity
		$url=$_SERVER['PATH_INFO'];
		
		switch($url){
			
			case '/':
			include_once('index.php');
			break;
			
			case '/index'://feedback form
			if(isset($_REQUEST['submit']))
			{
				$customer_id=$_REQUEST['customer_id'];
				$vendor_id=$_REQUEST['vendor_id'];
				$rating=$_REQUEST['rating'];
				$comment=$_REQUEST['comment'];
				$date=$_REQUEST['date'];
				
				$data=array("customer_id"=>$customer_id,"vendor_id"=>$vendor_id,"rating"=>$rating,"comment"=>$comment,"date"=>$date);
				$res=$this->insert('feedback',$data);
				echo "<script>alert('Send Successfully');</script>";
			}
			include_once('index.php');
			break;
			
			case '/vendors':
			//$vendors_arr=$this->select('vendors');
			include_once('vendors.php');
			break;
			
			case '/vendor-details':
			//$vendors_arr=$this->select('vendors');
			include_once('vendor-details.php');
			break;
			
			case '/contact':
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['name'];
				$email=$_REQUEST['email'];
				$message=$_REQUEST['message'];
				
				$data=array("name"=>$name,"email"=>$email,"message"=>$message);
				$res=$this->insert('contact',$data);
				echo "<script>alert('Send Successfully');</script>";
			}
			include_once('contact.php');
			break;
			
			
				
			case '/register':
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['name'];
				$email=$_REQUEST['email'];
				$password=md5($_REQUEST['password']);
				$mobile=$_REQUEST['mobile'];
				$gender=$_REQUEST['gender'];
				
				$data=array("name"=>$name,"email"=>$email,"password"=>$password,"mobile"=>$mobile,"gender"=>$gender);
				$res=$this->insert('customers',$data);
				echo "<script>alert('Register Successfully');</script>";
			}
			include_once('register.php');
			break;
			
			case '/login':
			if(isset($_REQUEST['submit']))
            {
                $email=$_REQUEST['email'];
                $password=md5($_REQUEST['password']);  // hash pass encript
                       
                $arr=array("email"=>$email,"password"=>$password);
                       
				$res=$this->select_where('customers',$arr);    
                $chk=$res->num_rows;
				if($chk==1) // 1 means true
				{
					// create session
					$fetch=$res->fetch_object(); // fetch data whose email & pass match
					$_SESSION['user_id']=$fetch->id;
				    $_SESSION['user_email']=$fetch->email;
					$_SESSION['user_name']=$fetch->name;
					
					echo "<script>alert('Login Success');window.location='index';</script>";
				}
				else
				{
					echo "<script>alert('Login Failed Due to wrong Creadential');</script>";
				}
						
            }
			include_once('login.php');
			break;
			
			case '/user_logout':
				unset($_SESSION['user_id']);
				unset($_SESSION['user_email']);
				unset($_SESSION['user_name']);
				echo "<script>alert('Logout Success');window.location='index';</script>";
				break;
				
			case '/user_profile':

				if(isset($_SESSION['user_id']))
				{
					$id = $_SESSION['user_id'];

					$arr = array("id"=>$id);
					$run = $this->select_where('customers',$arr);
					$fetch = $run->fetch_object();

					include_once('user_profile.php');
				}
				else
				{
					echo "<script>
							alert('Please Login First');
							window.location='login';
						  </script>";
				}

			break;
			
			case '/edit_profile':

			$id = $_SESSION['user_id'];

			$where = array("id"=>$id);
			$run = $this->select_where('customers',$where);
			$fetch = $run->fetch_object();

			if(isset($_REQUEST['submit']))
			{
				$name   = $_REQUEST['name'];
				$email  = $_REQUEST['email'];
				$gender = $_REQUEST['gender'];
				$mobile = $_REQUEST['mobile'];

				$arr = array("name"=>$name,"email"=>$email,"gender"=>$gender,"mobile"=>$mobile);
				$res = $this->update_where('customers',$arr,$where);
				if($res)
				{
					echo "<script>alert('Profile Updated Successfully');window.location='user_profile';</script>";
				}
			}
			include_once('edit_profile.php');
			break;
			
			default:
			echo "<h1>Page Not Found</h1>";
			break;
			
		}
		
		
	}
	
}
$obj=new control;
?>