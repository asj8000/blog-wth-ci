<?php

namespace App\Controllers;

use App\Models\CommentModel;

class Comments extends BaseController
{
    public function create()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() === 'post') {
            $commentModel = new CommentModel();
            
            $data = [
                'post_id' => $this->request->getPost('post_id'),
                'user_id' => session()->get('user_id'),
                'content' => $this->request->getPost('content'),
            ];
            
            $commentModel->insert($data);
            return redirect()->back();
        }
    }
} 