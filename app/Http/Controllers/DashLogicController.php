<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Lamda\Core\Http\Controller;
use Lamda\Core\Http\Request;
use Lamda\Core\Http\Response;

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
        $tampName = $file['tmp_name'];
        $error = $file['error'];

        if($error == 0){
            $extentionFile = pathinfo($nameFile, PATHINFO_EXTENSION);
            $extentionFile = strtolower($extentionFile);

            $newNameFile = date('YmdHis'). '-' . uniqid() . '.' . $extentionFile;
            $Destination = dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'resources'.DIRECTORY_SEPARATOR.'images'. DIRECTORY_SEPARATOR . $newNameFile;

        

            if(!move_uploaded_file($tampName, $Destination)){
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

        return $this->redirect('/dashboard/list-news');
    }

    public function updateNews($slug){
        $request = Request::input();
        
    }

    
}