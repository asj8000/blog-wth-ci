<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $allowedFields = ['user_id', 'title', 'content'];
    protected $useTimestamps = true;
    protected $returnType = 'array';

    public function getPostWithUser($id = null)
    {
        $this->select('posts.*, users.username');
        $this->join('users', 'users.id = posts.user_id');
        
        if ($id !== null) {
            return $this->find($id);
        }
        
        return $this->findAll();
    }
} 