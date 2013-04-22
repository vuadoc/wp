<?php 
	class Admin extends CI_Controller{
		function __construct(){
			parent::__construct();
			 $this->load->model('admin_model','',TRUE);
		}
		
		/*     * *********************************************
		 * ****LOGIN MANAGEMENT******************************** */
		 
		/**
     	* Function to handle the admin home page.**/
     			
		function index(){
			$data['title'] = "Trang chủ Admin";
			if($this->session->userdata('admin_logged_in')){
				$session_data = $this->session->userdata('admin_logged_in');
				$data['admin_username'] = $session_data['admin_username'];
				$this->load->view('admin/admin_home_view', $data);
			}
			else {
				redirect('/admin/login');
			}
		}
		
		/**
     	* Function to handle the admin login page.**/
		function login(){
			$data['title'] = "Trang đăng nhập Admin";
        	$this->load->library('form_validation');
   			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	
		    if($this->form_validation->run() == FALSE)
    		{
      		//Field validation failed.  User redirected to login page
     	 		$this->load->view('admin/admin_login_view',$data);
    		}
    		else
    		{
     		 //Go to private area

      			redirect('admin','refresh');
			
			}
		}
		
		function check_database($password){
   		 //Field validation succeeded.  Validate against database
    		$username = $this->input->post('username');
    
	   		 //query the database
		    $result = $this->admin_model->adminLogin($username, $password);
		    if($result)
		    {
		      $admin_sess_array = array();
		      foreach($result as $row)
		      {
		        $admin_sess_array = array(
		          'admin_id' => $row->id,
		          'admin_username' => $row->username
		        );
		        $this->session->set_userdata('admin_logged_in', $admin_sess_array);
			      }
		      return TRUE;
		    }
		    else
		    {
		      $this->form_validation->set_message('check_database', 'Invalid username or password');
		      return false;
		    }
		}
		
		/**
     	* Function to handle the admin logout.**/
		function logout()
  		{
    		$this->session->unset_userdata('admin_logged_in');
			$this->session->unset_userdata('admin_id');
			$this->session->unset_userdata('admin_username');
    		redirect('admin', 'refresh');  
  		}
	
		/********************************************
		 * ******USER MANAGEMENT******************************** */
		 
		 /**
     	* Function to handle the users . Display all users with edit and delete option
      	*/
    	function users($action = false) {
        	$data['title'] = 'Users';
        	$data['result'] = $result = $this->admin_model->getUsers();
        	$this->load->view('admin/admin_users_view', $data);
    	}
		
		/**
    	* Function to popup the edit user page
    	*/
    	function editUser($id) {
	        $data['id'] = $id;
	        $data['title'] = 'Edit users';
	        $data['result'] = $result = $this->admin_model->getUsersById($id);
       		//print_r($result);
	        $this->load->view('admin/admin_users_edit', $data);
	    }
		
		/**
     	* Function to save the user after edit
        */
    	function saveEditUser() {
        
        	$user['name'] = $this->input->post('name');
        	$user['email'] = $this->input->post('email');
        	$user['username'] = $this->input->post('username');
        	$id = $this->input->post('id');
        	$data['result'] = $result = $this->admin_model->saveEditUser($id, $user);
        	echo json_encode($result);
    	}
		
		/**
     	* Function show popup of confirm user delete
        */
    	function confirmDeleteUser($id) {
        	$data['id'] = $id;
        	$data['title'] = 'Delete users';
        	$this->load->view('admin/admin_users_delete', $data);
   	 	}
		
		/**
     	* Function delete an user account
        */
    	function deleteUser() {
        	$userId = $this->input->post('userId');
        	$this->admin_model->deleteAccount($userId);
        	echo json_encode(true);
    	}
	}
?>