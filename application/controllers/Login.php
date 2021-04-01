<?php 
class Login extends MY_controller
{
	public function __construct()
	{
    parent::__construct();
  	if($this->session->userdata('id') )
    return redirect('admin/welcome');
    }
	
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('uname','Username', 'required');
		$this->form_validation->set_rules('pass','Password', 'required|min_length[5]|max_length[12]');
		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
	if($this->form_validation->run())
	{
		$uname = $this->input->post('uname');
		$pass  = $this->input->post('pass');
		$this->load->model('login_model');
		$id = $this->login_model->isvalidate($uname,$pass);
		if($id)
		{

			$this->load->library('session');
			$this->session->set_userdata('id',$id);
			return redirect('admin/welcome');
		}
		else
		{
			$this->session->set_flashdata('login_failed','Invalid username or password');
			return redirect('login');
		}
	}
	else
	{
		$this->load->view('admin/login');
	}
	}
}
?>