<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $allowedFields = ['post_id', 'user_id', 'content'];
    protected $useTimestamps = true;
    protected $returnType = 'array';

    public function getCommentsForPost($postId)
    {
        return $this->select('comments.*, users.username')
                    ->join('users', 'users.id = comments.user_id')
                    ->where('post_id', $postId)
                    ->findAll();
    }
} 