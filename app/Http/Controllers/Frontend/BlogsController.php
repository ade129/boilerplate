<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quotes;
use App\Models\Tags;

class BlogsController extends Controller
{
    public function index()
    {
        $contents = [
            'quotes' => Quotes::with(['tags','images'])->get(),
            'tags' => Tags::all(),
        ];
        // return $contents;
        $pagecontent = view('frontend.blogs.index', $contents);

        $pagemain = array(
            'title' => 'Categories',
            // 'menu' => 'master',
            // 'submenu' => 'categories',
            'pagecontent' => $pagecontent
        );
        
        return view('frontend.masterpage_frontend', $pagemain);
    }

    public function show($tag_name)
    {
        $tags = Tags::with([
            'quotes' => function($image){
                $image->with('images');
            }
        ])
            ->where('tag_name',$tag_name) 
            ->get();
        // return $tags;
        $contents = [
            'tags' => $tags,
        ];
        $pagecontent = view('frontend.blogs.show', $contents);
        $pagemain = array(
            'title' => 'Show',
            'pagecontent' => $pagecontent
        );
        return view('frontend.masterpage_frontend', $pagemain);  
    }

    public function detail($slug)
    {
        $detail = Quotes::with(['tags','images'])->where('slug',$slug)->first();
        $contents = [
            'detail' => $detail,
        ];
        $pagecontent = view('frontend.blogs.detail',$contents);
        $pagemain = array (
            'title' => 'Detail',
            'pagecontent' => $pagecontent
        );
        return view('frontend.masterpage_frontend',$pagemain);
    }   

}
