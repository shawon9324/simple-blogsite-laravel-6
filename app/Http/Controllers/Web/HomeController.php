<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $data['blogs'] = Blog::with(['category'])->orderBy('id', 'desc')->paginate(9);
        //return $data['blogs'];

        return view('web.index')->with($data);
    }
    
}