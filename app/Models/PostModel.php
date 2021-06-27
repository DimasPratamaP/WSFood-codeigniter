<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PostModel extends Model{
    protected $table = 'posts';
    protected $allowedFields = ['users_id','judul','image','deskripsi'];
    
    function viewPost() 
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->join('users', 'users.id = posts.users_id');
        $query = $builder->get()->getResult();
        return $query;
    }

    function firstPost()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('users_id', session('id'));
        $query = $builder->get()->getResult();
        return $query;
    }    
}