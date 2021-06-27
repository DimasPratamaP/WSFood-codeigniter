<?php namespace App\Controllers;

use App\Models\PostModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Controller;
 
class Dashboard extends Controller
{
    protected $users;
 
    function __construct()
    {
        $this->users = new UserModel();
        $this->posts = new PostModel();
    }
 
    public function home()
    {
        $session = session();
        $data['nama'] = $session->get('nama');
        $data['id'] = $session->get('id');
        $data['posts'] = $this->posts->viewPost();
        return view('home', $data);
    }

    public function profile($id)
	{
		$data['users'] = $this->users->where('id', $id)->first();
		
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
		$data['users'] = $this->users->where('id', $id)->first();
		
		if(!$data['users']){
			throw PageNotFoundException::forPageNotFound();
		}
		echo view('account_security', $data);
    }

    public function changePassword()
    {
        $request = \Config\Services::request();

        $pass=$request->getPost('oldpassword');
        $npass=$request->getPost('newpassword');
        $rpass=$request->getPost('repassword');
        if($npass!=$rpass){
            session()->setFlashdata('not_matching', 'Password baru tidak cocok dengan konfirmasi Password');
            return redirect()->back();
        }else{
            $session = session();
            $users = $this->users->where('email',$session->get('email'))->first();
            $oldpass = $users['password'];
            $verify_pass = password_verify($pass, $oldpass);
            if($verify_pass){
                $data = array(
                            'password' => password_hash($npass,PASSWORD_DEFAULT)
                            );
                $this->users->update($users, $data); 
                session()->setFlashdata('message', 'Update Password Berhasil');
                return redirect()->back();
            }else{
                session()->setFlashdata('error', 'Password Lama tidak sesuai');
                return redirect()->back();
            }
        }
    }

    public function posting($id)
    {
		$data['users'] = $this->users->where('id', $id)->first();
		$data['posts'] = $this->posts->firstPost();
		if(!$data['users']){
			throw PageNotFoundException::forPageNotFound();
		}
		echo view('posts', $data);
    }
}