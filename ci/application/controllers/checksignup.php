<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checksignup extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('user','',TRUE);
  }

  function index()
  {
    //This method will have the credentials validation
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|max_length[12]|matches[passconf');
	  $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|xss_clean'); 
    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $this->load->view('signup_view');
    }
    else
    {
      //Go to private area
      $this->user->addmember();
      redirect('home', 'refresh');
    }
    
  }
  

}
?>