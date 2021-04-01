<?php 
class Users extends MY_controller
{
	public function __construct()
  	{
    parent::__construct();
    $this->load->model('login_model');
  	}

	public function index()
	{
		$this->load->view('users/article_list');
	}

	public function homepage()
	{
		$this->load->library('pagination');
		$config = [
				'base_url' => 'http://localhost/blog/users/homepage/',
				'per_page' => 3,
				'total_rows' => $this->login_model->all_articles_count(),
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

	$articles = $this->login_model->all_article_list($config['per_page'],$this->uri->segment(3)); 
	// print_r(compact('articles'));
	// exit;
	$this->load->view('users/article_list',compact('articles'));
	}
}
?>