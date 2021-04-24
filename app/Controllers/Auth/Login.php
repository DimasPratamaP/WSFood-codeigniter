<?php namespace App\Controllers\Auth;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('auth/login');
    } 
 
    public function doLogin()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'       => $data['id'],
                    'nama'     => $data['nama'],
                    'email'    => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/home');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}