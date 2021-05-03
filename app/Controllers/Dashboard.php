<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Controller;
 
class Dashboard extends Controller
{
    protected $users;
 
    function __construct()
    {
        $this->users = new UserModel();
    }
 
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

    public function editProfile($id)
	{
		if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                'required' => '{field} Harus diisi',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                'required' => '{field} Harus diisi',
                'valid_email' => 'Email Harus Valid'
                ]
            ],
            'nohp' => [
                'rules' => 'required|min_length[10]|max_length[12]',
                'errors' => [
                'required' => '{field} Harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
 
        $this->users->update($id, [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'nohp' => $this->request->getVar('nohp'),
            'alamat' => $this->request->getVar('alamat')
        ]);
        session()->setFlashdata('message', 'Update Profile Berhasil');
        return redirect()->back();
    }

    public function accountSecurity($id)
    {
        $users = new UserModel();
		$data['users'] = $users->where('id', $id)->first();
		
		if(!$data['users']){
			throw PageNotFoundException::forPageNotFound();
		}
		echo view('account_security', $data);
    }
}