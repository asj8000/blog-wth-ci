<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\CommentModel;

class Posts extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $postModel = new PostModel();
        $data['posts'] = $postModel->getPostWithUser();
        
        return view('posts/index', $data);
    }

    public function show($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $postModel = new PostModel();
        $commentModel = new CommentModel();
        
        $data['post'] = $postModel->getPostWithUser($id);
        $data['comments'] = $commentModel->getCommentsForPost($id);
        
        return view('posts/show', $data);
    }

    public function create()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() === 'post') {
            $postModel = new PostModel();
            
            $data = [
                'user_id' => session()->get('user_id'),
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
            ];
            
            $postModel->insert($data);
            return redirect()->to('/posts');
        }
        
        return view('posts/create');
    }
} 