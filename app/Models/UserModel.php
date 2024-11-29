<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password'];
    protected $useTimestamps = true;
    protected $returnType = 'array';

    public function verifyPassword($username, $password)
    {
        $user = $this->where('username', $username)->first();
        
        // 디버깅 로그 추가
        log_message('debug', 'User found: ' . ($user ? 'yes' : 'no'));
        if ($user) {
            log_message('debug', 'Password verification: ' . 
                (password_verify($password, $user['password']) ? 'success' : 'failed'));
        }
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
} 