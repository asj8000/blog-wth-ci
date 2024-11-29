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
            
            $user = $userModel->verifyPassword($username, $password);
            
            if ($user) {
                $session = session();
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'isLoggedIn' => true,
                ]);
                
                return redirect()->to('/posts');
            }
            
            return redirect()->back()->with('error', '로그인 실패');
        }
        
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
} 