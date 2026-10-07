<?php
include_once('../model.php');  // 1 model page load

class control extends model{  // 2 model class extends
	
	function __construct(){
		
		session_start();
		
		model::__construct();  // 3 call model __construct for connectivity
		$url=$_SERVER['PATH_INFO'];
		
		switch($url){
			
			case '/':
			include_once('index.php');
			break;
			
			case '/dashboard':
			include_once('dashboard.php');
			break;
			
			case '/admin-login':
			if(isset($_REQUEST['submit']))
                    {
                        $email=$_REQUEST['email'];
                        $password=md5($_REQUEST['password']);  // hash pass encript
                       
                        $arr=array("email"=>$email,"password"=>$password);
                       
					    $res=$this->select_where('admin',$arr);    
                        $chk=$res->num_rows; // check row wise dat get or not
						if($chk==1) // 1 means true
						{
							// create session
							$fetch=$res->fetch_object();
							$_SESSION['admin_email']=$fetch->email;
							$_SESSION['admin_name']=$fetch->name;
							echo "<script>alert('Login Success');window.location='dashboard';</script>";
						}
						else
						{
							echo "<script>alert('Login Failed Due to wrong Creadential');</script>";
						}
						
                    }	
			include_once('index.php');
			break;
			
			case '/admin-logout':
					unset($_SESSION['admin_email']);
					unset($_SESSION['admin_name']);
					echo "<script>alert('Logout Success');window.location='admin-login';</script>";
				break;
				
			
			case '/admin_profile':

				$arr = array("email"=>$_SESSION['admin_email']);
				$run = $this->select_where('admin',$arr);
				$fetch = $run->fetch_object();

				include_once('admin_profile.php');
			break;
			
			case '/edit_admin_profile':

				$arr = array("email"=>$_SESSION['admin_email']);
				$run = $this->select_where('admin',$arr);
				$fetch = $run->fetch_object();

				$where = array("id"=>$fetch->id);

				if(isset($_REQUEST['submit']))
				{
					$name  = $_REQUEST['name'];
					$email = $_REQUEST['email'];

					$data = array("name"=>$name,"email"=>$email);

					$res = $this->update_where('admin',$data,$where);

					if($res)
					{
						$_SESSION['admin_name'] = $name;
						$_SESSION['admin_email'] = $email;

						echo "<script>alert('Profile Updated Successfully');window.location='admin_profile';</script>";
					}
				}

				include_once('edit_admin_profile.php');
			break;
			
			case '/view_vendors':
			$vendors_arr=$this->select('vendors');
			include_once('view_vendors.php');
			break;
			
			case '/edit_vendors':

				$id = $_REQUEST['edit'];
				$where = array("id"=>$id);
				$run = $this->select_where('vendors',$where);
				$fetch = $run->fetch_object();

				$old_image = $fetch->image;
				if(isset($_REQUEST['submit']))
				{
					$name = $_REQUEST['name'];
					$category_id = $_REQUEST['category_id'];
					$price = $_REQUEST['price'];
					$rating = $_REQUEST['rating'];
					$location = $_REQUEST['location'];

					if($_FILES['image']['size'] > 0)
					{
						unlink('../assets/upload/vendor/'.$old_image);
						$image = $_FILES['image']['name'];
						$path = '../assets/upload/vendor/'.$image;
						move_uploaded_file($_FILES['image']['tmp_name'],$path);

						$arr = array("name"=>$name,"category_id"=>$category_id,"price"=>$price,"rating"=>$rating,"location"=>$location,"image"=>$image);
					}
					else
					{
						$arr = array("name"=>$name,"category_id"=>$category_id,"price"=>$price,"rating"=>$rating,"location"=>$location);
					}
					$this->update_where('vendors',$arr,$where);
					echo "<script>alert('Vendor Updated Successfully');window.location='view_vendors';</script>";
				}
				include_once('edit_vendors.php');
			break;
			
			case '/add_vendors':
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['name'];
				$category_id=$_REQUEST['category_id'];
				$price=$_REQUEST['price'];
				$rating=$_REQUEST['rating'];
				$location=$_REQUEST['location'];
				$image=$_FILES['image'];
				$path='../assets/upload/vendor/'.$image;  // path set
				$image_file=$_FILES['image']['tmp_name']; // get duplicate file
				move_uploaded_file($image_file,$path); // upload file in that path
			
				$data=array("name"=>$name,"category_id"=>$category_id,"price"=>$price,"rating"=>$rating,"location"=>$location,"image"=>$image);
				$res=$this->insert('vendors',$data);
				echo "<script>alert('Add Successfully');</script>";
			}
			include_once('add_vendors.php');
			break;

			case '/view_categories':
			$categories_arr=$this->select('categories');
			include_once('view_categories.php');
			break;
			
			case '/add_categories':
			if(isset($_REQUEST['submit']))
			{
				$name=$_REQUEST['name'];
				$image=$_FILES['image'];
				$path='../assets/upload/category/'.$image;  // path set
				$image_file=$_FILES['image']['tmp_name']; // get duplicate file
				move_uploaded_file($image_file,$path); // upload file in that path
				
				$description=$_REQUEST['description'];
				
				$data=array("name"=>$name,"image"=>$image,"description"=>$description);
				$res=$this->insert('categories',$data);
				echo "<script>alert('Add Successfully');</script>";
			}
			include_once('add_categories.php');
			break;
			
			case '/edit_categories':
			if(isset($_REQUEST['edit']))
			{
				$id=$_REQUEST['edit'];
				$where=array("id"=>$id);
				$run=$this->select_where('categories',$where); 
				$fetch=$run->fetch_object();
				
				$old_image=$fetch->image;
						
				if(isset($_REQUEST['submit']))
				{
					$name=$_REQUEST['name'];
					$description=$_REQUEST['description'];
					
					if($_FILES['image']['size']>0)
					{
						unlink('assets/upload/category/'.$old_image);
						// image upload
						$image=$_FILES['image']['name'];
						$path='assets/upload/category/'.$image;  // path set
						$image_file=$_FILES['image']['tmp_name']; // get duplicate file
						move_uploaded_file($image_file,$path); // upload file in that path
						
						$arr=array("name"=>$name,"image"=>$image,"description"=>$description);
						$res=$this->update_where('categories',$arr,$where);  
						
						echo "<script>alert('Update Success');window.location='view_categories';</script>";
					}
					else
					{
						$arr=array("name"=>$name,"description"=>$description);
						$res=$this->update_where('categories',$arr,$where);  
						echo "<script>alert('Update Success');window.location='view_categories';</script>";
					}	
				}			
			}
			include_once('edit_categories.php');
			break;
			
			case '/customers':
			$customers_arr=$this->select('customers');
			include_once('customers.php');
			break;
			
			case '/user_profile':
				if(isset($_REQUEST['id']))
				{
					$id = $_REQUEST['id'];
					$arr = array("id"=>$id);
					$run = $this->select_where('customers',$arr);
					$fetch = $run->fetch_object();
					include_once('user_profile.php');
				}
			break;
			
			case '/bookings':
			$bookings_arr=$this->select('bookings');
			
			include_once('bookings.php');
			break;
			
			
			
			case '/feedback':
			$feedback_arr=$this->select('feedback');
			include_once('feedback.php');
			break;
			
			case '/manage_contact':
			$contact_arr=$this->select('contact');
			include_once('manage_contact.php');
			break;
			
			case '/delete':
                    
					
					if(isset($_REQUEST['del_vendors']))
					{
						$id=$_REQUEST['del_vendors'];
						$arr=array("id"=>$id);
						
						$run=$this->select_where('vendors',$arr); // delete image from upload folder
						$fetch=$run->fetch_object();
						$image=$fetch->image;
						unlink('../assets/upload/vendor/'.$image);
						
						$res=$this->delete_where('vendors',$arr);
						echo "<script>alert('Vendor Deleted');window.location='view_vendors';</script>";
					}
					if(isset($_REQUEST['del_categories']))
					{
						$id=$_REQUEST['del_categories'];
						$arr=array("id"=>$id);
						
						$run=$this->select_where('categories',$arr); // delete image from upload folder
						$fetch=$run->fetch_object();
						$image=$fetch->image;
						unlink('../assets/upload/category/'.$image);
						
						$res=$this->delete_where('categories',$arr);
						echo "<script>alert('categories Deleted');window.location='view_categories';</script>";
					}
					if(isset($_REQUEST['del_customer']))
					{
						$id=$_REQUEST['del_customer'];
						$arr=array("id"=>$id);
						$res=$this->delete_where('customers',$arr);
						echo "<script>alert('Customer Deleted');window.location='customers';</script>";
					}
					if(isset($_REQUEST['del_feedback']))
					{
						$id=$_REQUEST['del_feedback'];
						$arr=array("id"=>$id);
						$res=$this->delete_where('feedback',$arr);
						echo "<script>alert('Feedback Delete');window.location='feedback';</script>";
					}
					if(isset($_REQUEST['del_contact']))
					{
						$id=$_REQUEST['del_contact'];
						$arr=array("id"=>$id);
						$res=$this->delete_where('contact',$arr);
						echo "<script>alert('Contact Deleted');window.location='manage_contact';</script>";
					}
					
			break;
			
			default:
			echo "<h1>Page Not Found</h1>";
			break;
			
		}
		
		
	}
	
}
$obj=new control;
?>