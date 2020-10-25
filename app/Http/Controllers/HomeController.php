<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('Home');
    }
    public function about(){
        return view('About');
    }
    public function post($id = 1,$auther=' hania '){
        $posts=[
            1 => ['titel'=>' hi i am you '],
            2 => ['titel'=>'hi who tf are you']
        ];
        return view('post.Show',[
            'data'=>$posts[$id],
            'auther'=>$auther
        ]);
    }
}
