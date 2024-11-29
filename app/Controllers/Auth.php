<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $userModel = new UserModel();
            
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            
            log_message('debug', 'Login attempt - Username: ' . $username);
            
            $user = $userModel->verifyPassword($username, $password);
            
            log_message('debug', 'Verification result: ' . ($user ? 'success' : 'failed'));
            
            if ($user) {
                $session = session();
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'isLoggedIn' => true,
                ]);
                
                return redirect()->to('/posts');
            }
            
            return redirect()->back()->with('error', '아이디 또는 비밀번호가 올바르지 않습니다.');
        }
        
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
} 