<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Controller;
 
class Dashboard extends Controller
{
    public function home()
    {
        $session = session();
        $data['nama'] = $session->get('nama');
        $data['id'] = $session->get('id');
        return view('home', $data);
    }

    public function profile($id)
	{
		$users = new UserModel();
		$data['users'] = $users->where('id', $id)->first();
		
		if(!$data['users']){
			throw PageNotFoundException::forPageNotFound();
		}
		echo view('profile', $data);
    }
}