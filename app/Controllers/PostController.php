<?php

namespace App\Controllers;

use App\Models\PostModel;

class PostController extends BaseController
{
	public function save()
    {
        $model = new PostModel();
        $session = session();
        $users_id = $session->get('id');

        $image = $this->request->getFile('image');
        $image->move(ROOTPATH . 'public\img');
        $namaImage = $image->getName();

        $data = [
            'users_id'   => $users_id,
            'judul'     => $this->request->getVar('judul'),
            'image'     => $namaImage,
            'deskripsi'    => $this->request->getVar('deskripsi'),
        ];
        $model->save($data);
        return redirect()->to('/users/home');
         
    }
}
