<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PostModel extends Model{
    protected $table = 'posts';
    protected $allowedFields = ['users_id','judul','image','deskripsi'];
    
}