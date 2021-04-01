<?php 
class Register extends MY_controller
{
	public function __construct()
	{
    parent::__construct();
    if($this->session->userdata('id'))
    {
    	return redirect('admin/welcome');
    }
    
  	}
    
	

	public function index()
	{
		$this->load->view('admin/register');
	}	

	public function sendemail()
	{
		if($this->form_validation->run('registration_form'))
		{
			$post = $this->input->post();
			$password = md5($post['password']);
			$post['password'] = $password;
			$user_email = $post['email'];
			$this->load->model('login_model');
			if($this->login_model->add_user($post))
			{
				$this->load->library('email');
			    // $this->email->from(set_value('email'),set_value('name'));
			    $this->email->from('geetaverma6653@gmail.com','Geeta');
			    $this->email->to("$user_email");
			    $this->email->subject("Registration Greeting..");
			    $this->email->message("Thank  You for Registratiion");
			    $this->email->set_newline("\r\n");
			    // $this->email->send();

			     if ($this->email->send()) {
			     	echo "Your e-mail has been sent!";
			   		 }
				 else {
				    show_error($this->email->print_debugger());
				  }
				
				$this->session->set_flashdata('user_added','User registered succesfully');
				
				return redirect('login/');
			}
			else
			{
				$this->session->set_flashdata('user_not_added','User not Registered');
				return redirect('register/');
			}
		}
		else
		{
			$this->load->view('admin/register');
		}
	}
}
?>