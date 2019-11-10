<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    public function index()
    {
        $contents = [
            'tag' => Tags::all(),
        ];

        $pagecontent = view('tags.index', $contents);

        // masterpage
        $pagemain = array(
            'title' => 'Tag',
            'menu' => 'master',
            'submenu' => 'tags',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
      $pagecontent = view('tags.create');
  
      //masterpage
      $pagemain = array(
          'title' => 'tags',
          'menu' => 'tags',
          'submenu' => 'tags',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'tag_name' => 'required',
            'slug' => 'required',
            'status' => ''
        ]);

        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveTags = new Tags;
        $saveTags->tag_name = $request->tag_name;
        $saveTags->slug = $request->slug;
        $saveTags->active = $active;
        $saveTags->save();
        return redirect('tags')->with('status_success','Created Tags');
    }

    public function update_page(Tags $tag)
    {
        $contents = [
            'tag' => Tags::find($tag->idtags)
        ];

        // return $contents;
        $pagecontent = view('tags.update');
  
      //masterpage
      $pagemain = array(
          'title' => 'tag',
          'menu' => 'tags',
          'submenu' => 'tags',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }
}
