<?php 
	class Admin_model extends CI_Model {
	    	
	    public function __construct() {
    	    parent::__construct();
   	 	}
		
		/**
     	* Function to handle the admin login page.
		* **/
     	
		function adminLogin($username, $password) {
        	$this -> db -> select('id, username, password, role');
			$this -> db -> from('User');
			$this -> db -> where('username', $username);
			$this -> db -> where('password', $password);
			$this -> db -> where('role', 0); 
			$this -> db -> limit(1);

			$query = $this -> db -> get();

			if($query -> num_rows() == 1)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
		
		/**
     	* Function to handle the users . Display all users with edit and delete option.
		* **/
		
		function getUsers() {
        	$sql = "SELECT *
            	        FROM
                	        User";
        	$query = $this->db->query($sql);
        	if ($query->num_rows > 0) {
            	return $query->result();
       	 	} else {
            	return false;
        	}
			
		}
    	
		/**
     	* Function to get user details by id
		* **/
		function getUsersById($id){
			$sql = "SELECT * 
						FROM
							User
						WHERE
							id = {$id}";
			$query = $this->db->query($sql);
			if ($query->num_rows > 0){
				return $query->result();
			} else {
				return false;
			}
		}
    	
		/**
     	* Function to save the user after edit
        */
    	function saveEditUser($id, $user) {
        	$this->db->where('id', $id);
        	$this->db->update('User', $user);
        	return true;
    	}
		
	 	/*
     	* Function to delete a user account
      	*/
    	function deleteAccount($userid)
    	{
        	/*Delete from user table*/
        	$this->db->where('id', $userid);
        	$this->db->delete('User');
			
		}
	}
?>
