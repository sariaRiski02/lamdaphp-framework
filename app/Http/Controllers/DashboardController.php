<?php

namespace App\Http\Controllers;

use App\Models\News;
use Lamda\Core\Http\Request;
use Lamda\Core\Http\Controller;
use Lamda\Core\Http\Response;
use Lamda\Core\SSE\EventDispatcher;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $news = News::all();
        return $this->view('Dashboard.dashboard', compact('news'));
    }

    public function store()
    {
        $input = Request::input();
        $inputTitle = $input['title'] ?? 'No Title';
        $inputContent = $input['content'] ?? 'No Content';
        $status = $input['status'] ?? 'draft';
        
        News::create([
            'title' => $inputTitle,
            'content' => $inputContent,
            'slug' => strtolower(str_replace(' ', '-', $inputTitle)) . '-' . time(),
            'user_id' => $_SESSION['user']['id'],
            'status' => $status
        ]);

        EventDispatcher::dispatch([]);

        return Response::redirect('/dashboard');

    }

    public function delete($id){
        $news = News::find($id);
        if ($news) {
            News::delete($id);
            EventDispatcher::dispatch([]);
        }
        return Response::redirect('/dashboard');
    }

    public function update($id){
        $news = News::find($id);
        return $this->view('Dashboard.dash_update', compact('news'));
    }

    public function updatePost($id){
        $input = Request::input();
        $inputTitle = $input['title'] ?? 'No Title';
        $inputContent = $input['content'] ?? 'No Content';
        $status = $input['status'] ?? 'draft';

        News::update($id, [
            'title' => $inputTitle,
            'content' => $inputContent,
            'status' => $status
        ]);

        EventDispatcher::dispatch([]);

        return Response::redirect('/dashboard');
    }
}