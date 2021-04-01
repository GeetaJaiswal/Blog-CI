<?php 
class Admin extends MY_controller
{
	public function __construct()
  	{
    parent::__construct();
    if( ! $this->session->userdata('id') )
    return redirect('login');
  	}

	public function welcome()
	{
		$config = [
				'base_url' => base_url('admin/welcome'),
				'per_page' => 3,
				'total_rows' => $this->login_model->num_rows(),
				'full_tag_open'=>"<ul class='pagination'>",
		        'full_tag_close'=>"</ul>",
		        'next_tag_open' =>"<li>",
		        'next_tag_close' =>"</li>",
		        'prev_tag_open' =>"<li>",
		        'prev_tag_close' =>"</li>",
		        'num_tag_open' =>"<li>",
		        'num_tag_close' =>"<li>",
		        'cur_tag_open' =>"<li class='active'><a>",
		        'cur_tag_close' =>"</a></li>"
			];
	
	$this->pagination->initialize($config);

	$articles = $this->login_model->article_list($config['per_page'],$this->uri->segment(3)); 
	$this->load->view('admin/dashboard',['articles'=>$articles]);
	}

	public function add_article()
	{
		$this->load->view('admin/add_article');
	}

	public function delete_article()
	{
		$id = $this->input->post('id');
		$this->load->model('login_model');

		if($this->login_model->del_article($id))
			{
				$this->session->set_flashdata('article_deleted','Article deleted succesfully');
				return redirect('admin/welcome');
			}
			else
			{
				$this->session->set_flashdata('article_not_deleted','Unable to delete article');
				return redirect('admin/welcome');
			}
	}

	public function user_validation()
	{
		$config=[
			'upload_path'=>'./upload/',
			'allowed_types'=>'gif|jpg|png|jpeg',
		];
		$this->load->library('upload',$config);
		if($this->form_validation->run('add_article_rules') && $this->upload->do_upload())
		{
			$post = $this->input->post();
			// print_r($post);
			// exit;
			$data = $this->upload->data();
			$image_path = base_url("upload/".$data['raw_name'].$data['file_ext']);
			$post['image_path'] = $image_path;
			$this->load->model('login_model');
			if($this->login_model->add_article($post))
			{
				$this->session->set_flashdata('article_added','Article added succesfully');
				return redirect('admin/welcome');
			}
			else
			{
				$this->session->set_flashdata('article_not_added','Unable to add article');
				return redirect('admin/add_article');
			}
		}
		else
		{
			$upload_error = $this->upload->display_errors();
			$this->load->view('admin/add_article', compact('upload_error'));
		}
	}

	public function edit_article($id)
	{
		$this->load->model('login_model');
		$article = $this->login_model->find_article($id);
		$this->load->view('admin/edit_article',['article'=>$article]);
	}

	public function update_article($articleid)
	{
		if($this->form_validation->run('add_article_rules'))
		{
			$post = $this->input->post();
			// $articleid = $post['id'];
			// unset($articleid);
			$this->load->model('login_model');
			if($this->login_model->update_article($articleid,$post))
			{
				$this->session->set_flashdata('article_edited','Article edited succesfully');
				return redirect('admin/welcome');
			}
			else
			{
				$this->session->set_flashdata('article_not_edited','Unable to edit article');
				return redirect('admin/welcome');
			}
			return redirect('admin/welcome');
		}
		else
		{
		   $this->edit_article($articleid);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		return redirect('login');
	}
}
?>