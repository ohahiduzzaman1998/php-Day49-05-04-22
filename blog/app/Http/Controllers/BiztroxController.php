<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BiztroxController extends Controller
{
    private $recentBlogs;
    private $blog;
    private $blogs;
    private $categories;

    public function index()
    {
        $this->recentBlogs = Blog::where('status',1)->orderBy('id','desc')->take('3')->get();
        return view ('website.home.home',['recent_blogs'=> $this->recentBlogs]);
    }

    public function category($id)
    {
        $this->blogs = Blog::where('category_id',$id)->where('status',1)->orderBy('id','desc')->get();

        return view('website.category.category', [ 'blogs'=> $this->blogs]);
    }

    public function detail($id)
    {
        $this->blog = Blog::find($id);
        return view('website.detail.detail',['blog'=> $this->blog]);
    }

    public function contact()
    {
        return view('website.contact.contact');
    }
}
