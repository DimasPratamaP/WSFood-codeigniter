<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Dashboard extends Controller
{
    public function home()
    {
        $session = session();
        $data_nama = $session->get('nama');
        return view('home', compact('data_nama'));
    }
}