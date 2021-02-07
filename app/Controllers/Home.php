<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome');
	}

	public function food()
	{
		return view('food');
	}
}
