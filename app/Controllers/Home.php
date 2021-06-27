<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
	public function index()
	{
		$post = new PostModel();
		$data['posts'] = $post->viewPost();
		echo view('welcome', $data);
	}

	public function food()
	{
		return view('food');
	}
}
