<?php 
class Encryption extends MY_controller
{
	public function __construct()
  	{
	    parent::__construct();
	    if( ! $this->session->userdata('id') )
	    return redirect('login');
		$this->load->library('encrypt');
  	}

  	public function index()
  	{
  		$this->load->view('encryption/show_form');
  	}

  	public function key_encoder()
  	{
  		$this->form_validation->set_rules('key', 'Message', 'trim|required');
  		if($this->form_validation->run() == FALSE)
  		{
  			$this->load->view('encryption/show_form');
  		}
  		else
  		{
  			$key = $this->input->post('key');
  			$data['encrypt_value'] = $this->encrypt->encode($key);
  			$this->load->view('encryption/show_form',$data);
  		}
  	}

  	public function key_decoder()
  	{
  		$this->form_validation->set_rules('encrypt_key', 'Message', 'trim|required');
  		if($this->form_validation->run()==FALSE)
  		{
  			$this->load->view('encryption/show_form');
  		}
  		else
  		{
  			$key = $this->input->post('encrypt_key');
  			$data['decrypt_value'] = $this->encrypt->decode($key);
  			$this->load->view('encryption/show_form',$data);
  		}
  	}
}