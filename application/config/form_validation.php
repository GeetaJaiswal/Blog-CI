<?php 
$config=[

		'add_article_rules'=>[
						[
						'field'=>'article_title',
						'label' => 'Article title',
						'rules' => 'required'
						],
						[
						'field'=>'article_body',
						'label' => 'Article body',
						'rules' => 'required'
						]
					],

		'registration_form'=>[
						[
						'field'=>'username',
						'label' => 'Username',
						'rules' => 'required|is_unique[users.username]'
						],
						[
						'field'=>'name',
						'label' => 'Name',
						'rules' => 'required'
						],
						[
						'field'=>'email',
						'label' => 'Email',
						'rules' => 'required|valid_email|is_unique[users.email]'
						],
						[
						'field'=>'password',
						'label' => 'Password',
						'rules' => 'required|max_length[12]|min_length[5]'
						]
					],

		];
?>