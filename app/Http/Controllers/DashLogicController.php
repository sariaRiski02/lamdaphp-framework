<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Lamda\Core\Http\Controller;
use Lamda\Core\Http\Request;
use Lamda\Core\SSE\EventDispatcher;

class DashLogicController extends Controller
{
    public function storeNews(){
        $request = Request::input();
        // inputan tidak bisa kosong
        foreach($request as $item){
            if(!$item){
                return $this->redirect('/dashboard/add-news');
            }
        }
        $idCategory = Category::where('slug',value:$request['category_id'])[0]['id'];

        $request['category_id'] = $idCategory; 
        
        // membuat slug
        if(str_contains($request['title'], ' ')){
           $request['slug'] = str_replace(' ', '-', $request['title']);
        }else{
            $request['slug'] = $request['title'] . uniqid();
        }
        // set user id
        $request['user_id'] = 1;
        
        // simpan thumbnail
        $file = $_FILES['thumbnail'];
        $nameFile = $file['name'];
        $tmpName = $file['tmp_name'];
        $error = $file['error'];

        if($error == 0){
            $extentionFile = pathinfo($nameFile, PATHINFO_EXTENSION);
            $extentionFile = strtolower($extentionFile);

            $newNameFile = date('YmdHis'). '-' . uniqid() . '.' . $extentionFile;
            $Destination = dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'resources'.DIRECTORY_SEPARATOR.'images'. DIRECTORY_SEPARATOR . $newNameFile;

        

            if(!move_uploaded_file($tmpName, $Destination)){
                return $this->redirect('/dashboard/add-news');
            }

            $request['thumbnail'] = $newNameFile;
        }
        // simpan data
        try {
            News::create($request);
        } catch (\Throwable $th) {
            return $this->redirect('/dashboard/add-news');
        }

        EventDispatcher::dispatch('news_update', 
        [
            'message' => 'News updated'
        ]);


        return $this->redirect('/dashboard/list-news');
    }

    public function updateNews($slug){
        $request = Request::input();

        // inputan tidak bisa kosong
        
        $thumbnailRequired = false;

        foreach($request as $item){
            if(!$item && !$thumbnailRequired){
                return $this->redirect('/dashboard/news/update/'.$slug);
            }
        }

         // membuat slug
        if(str_contains($request['title'], ' ')){
           $request['slug'] = str_replace(' ', '-', $request['title']);
        }else{
            $request['slug'] = $request['title'] . uniqid();
        }
        // set user id
        $request['user_id'] = 1;

        // upload file
        $file = $_FILES['thumbnail'];
        $nameFile = $file['name'];
        $tmpName =  $file['tmp_name'];
        $error = $file['error'];

        // cek thumbnail di database


        if($error == 0){
            $Destination = dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'resources'.DIRECTORY_SEPARATOR.'images'. DIRECTORY_SEPARATOR;
            $extentionFile = strtolower(pathinfo($nameFile, PATHINFO_EXTENSION));
            $newNameFile = date('YmdHis'). '-' . uniqid() . '.' . $extentionFile;
            $Destination =  $Destination . $newNameFile;

            // hapus file lama
            $news = News::where('slug',value:$slug)[0];
            $oldFile = dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'resources'.DIRECTORY_SEPARATOR.'images'. DIRECTORY_SEPARATOR . $news['thumbnail'];
            if(file_exists($oldFile)){
                unlink($oldFile);
            }

            if(!move_uploaded_file($tmpName, $Destination)){
                return $this->redirect('/dashboard/add-news');
            }
            $request['thumbnail'] = $newNameFile;
        }
        
        $news = News::where('slug',value:$slug)[0];
        try {
            News::update($news['id'], $request);
            
        } catch (\Throwable $th) {
            return $this->redirect('/dashboard/news/update/'.$slug);
            
        }


        EventDispatcher::dispatch('news_update', 
        [
            'message' => 'News updated'
        ]);

        return $this->redirect('/dashboard/list-news');

        
    }

    public function deleteNews($slug){
        $news = News::where('slug', value:$slug)[0];

        // hapus file gambar
        if($news['thumbnail'] === null){
            return $this->redirect('/dashboard/list-news');
        }
        $oldFile = dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'resources'.DIRECTORY_SEPARATOR.'images'. DIRECTORY_SEPARATOR . $news['thumbnail'];
        if(file_exists($oldFile)){
            unlink($oldFile);
        }

        try {
            News::delete($news['id']);
        } catch (\Throwable $th) {
            return $this->redirect('/dashboard/list-news');
        }

        EventDispatcher::dispatch('news_update', 
        [
            'message' => 'News updated'
        ]);

        return $this->redirect('/dashboard/list-news');
    }

    public function storeCategory(){

        $request = Request::input();
        // inputan tidak bisa kosong
        
        if(!$request['name']){
            return $this->redirect('/dashboard/category');
        }
        


        // membuat slug
        if(str_contains($request['name'], ' ')){
           $request['slug'] = str_replace(' ', '-', $request['name']);
        }else{
            $request['slug'] = $request['name'] . uniqid();
        }

        $request['user_id'] = 1;

        // simpan data
        try {
            Category::create($request);
        } catch (\Throwable $th) {
            var_dump($th);
            return $this->redirect('/dashboard/category');
        }

        return $this->redirect('/dashboard/category');
    }

    public function updateCategory($slug){
        $request = Request::input();


        // inputan tidak bisa kosong
        if(!$request['name']){
            return $this->redirect('/dashboard/category/update/'.$slug);
        }

         // membuat slug
        if(str_contains($request['name'], ' ')){
           $request['slug'] = str_replace(' ', '-', $request['name']);
        }else{
            $request['slug'] = $request['name'] . uniqid();
        }

        $category = Category::where('slug',value:$slug)[0];
        try {
            Category::update($category['id'], $request);
            
        } catch (\Throwable $th) {
            return $this->redirect('/dashboard/category/update/'.$slug);
            
        }

        return $this->redirect('/dashboard/category');
    }

    public function deleteCategory($slug){
        $category = Category::where('slug', value:$slug)[0];
        
        try {
            Category::delete($category['id']);
        } catch (\Throwable $th) {
            return $this->redirect('/dashboard/category');
        }

        return $this->redirect('/dashboard/category');
    }
    
}