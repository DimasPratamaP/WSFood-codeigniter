<?php namespace App\Controllers\Auth;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Register extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('auth/register', $data);
    }
 
    public function save()
    {
        helper(['form']);
        $rules = [
            'nama'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'alamat'        => 'required',
            'nohp'          => 'required|min_length[10]|max_length[12]',
            'password'      => 'required|min_length[8]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'nama'     => $this->request->getVar('nama'),
                'email'    => $this->request->getVar('email'),
                'alamat'    => $this->request->getVar('alamat'),
                'nohp'    => $this->request->getVar('nohp'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('welcome', $data);
        }
         
    }
 
}