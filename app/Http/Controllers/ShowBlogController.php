<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class ShowBlogController extends Controller
{
    public function index()
    {
        $data = Blog::latest()->paginate(10);
        return view('front.blog', compact('data'));
    }
    public function read($slug)
    {
        $recent = Blog::orderBy('created_at', 'asc')->paginate(5);
        $data = Blog::where('slug', $slug)->first();
        return view('front.read', compact('data', 'recent'));
    }
}