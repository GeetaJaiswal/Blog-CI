<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
class Login_model extends CI_model
{
	function __construct()
	{
    parent:: __construct();
	}

	public function isvalidate($username, $password)
	{
		 $q = $this->db->where(['username'=>$username,'password'=>md5($password)])
		 				->get('users');
						// $q->row();
						// echo "<pre>";
						// print_r($q);
						// exit; 

		 				if($q->num_rows())
		 				{
		 					return $q->row()->id;
		 				}
		 				else
		 				{
		 					return false;
		 				} 
	}

	public function article_list($limit,$offset)
	{
		$id = $this->session->userdata('id');
		$q = $this->db->select()
					->from('articles')
					->where(['user_id'=>$id])
					->limit($limit,$offset)
					->get();
					return $q->result();

	}

	public function add_article($array)
	{
		return $this->db->insert('articles',$array);
	}

	public function del_article($id)
	{
		return $this->db->delete('articles',['id'=>$id]);
	}

	public function find_article($articleid)
	{
		$q = $this->db->select()
					->where('id',$articleid)
					->get('articles');
					return $q->row();
	}

	public function update_article($articleid, Array $article)
	{
		return $this->db->where('id',$articleid)
					->update('articles',$article);
	}

	public function num_rows()
	{
		$id = $this->session->userdata('id');
		$q = $this->db->select()
					->from('articles')
					->where(['user_id'=>$id])
					->get();
					return $q->num_rows();
	}

	public function add_user($array)
	{
		return $this->db->insert('users',$array);
	}

	public function all_articles_count()
	{
		$q = $this->db->select()
					->from('articles')
					->get();
					return $q->num_rows();
	}

	public function all_article_list($limit,$offset)
	{
		$query = $this->db->select()
					->from('articles')
					->limit($limit,$offset)
					->get();
					return $query->result();

	}


} 
?>