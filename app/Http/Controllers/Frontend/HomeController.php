<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $contents = [
            // 'categories' => Categories::all(),
        ];
        // ini untuk track data masuk atau tidak
        // dd($contents);

        $pagecontent = view('frontend.home.index' ); // unuk menampilkan view categories dr view

        // masterpage
        $pagemain = array(
            'title' => 'Categories',
            // 'menu' => 'master',
            // 'submenu' => 'categories',
            'pagecontent' => $pagecontent
        );
        
        return view('frontend.masterpage_frontend', $pagemain);
        // return view('frontend.home.index');

    }
}
