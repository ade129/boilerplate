<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotes;
use App\Models\Tags;
use App\Models\Images;
use Illuminate\Support\Str;
use Auth;
use Image;

class QuotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    
    public function index()
    {
        $contents = [
            'quotes' => Quotes::with(['tags','images'])->get(),
        ];
        // return $contents;
        $pagecontent = view('quotes.index', $contents);

        // masterpage
        $pagemain = array(
            'title' => 'Tags',
            'menu' => 'master',
            'submenu' => 'tags',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $tags = Tags::all();
        $contents = [
            'tags' => $tags,
            'quote' => Quotes::all(),
        ];

      $pagecontent = view('quotes.create', $contents);
  
      //masterpage
      $pagemain = array(
          'title' => 'quotes',
          'menu' => 'quotes',
          'submenu' => 'quotes',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }
    
    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'tittle' => 'required',
            // 'slug' => 'required',
            'subject' => 'required',
            'status' => ''
        ]);

        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $quotesSave = new Quotes;
        $quotesSave->tittle = $request->tittle;
        $quotesSave->slug =  $slug = Str::slug($request->tittle, '-');
        $quotesSave->subject = $request->subject;
        $quotesSave->active = $active;
        $quotesSave->save();

        //save image 
        $save_image = new Images;
        $save_image->idquotes = $quotesSave->idquotes;
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/images/' . $re_image) );
            $save_image->name = $re_image;
        }
        $save_image->save();
        
        //save tags
        $quotesSave->tags()->attach($request->tag,[
                                    'created_at' => date('Y-m-d H:i:s')
                                    ]);

        return redirect('quotes')->with('status_success','Created Quotes');
    }

    public function update_page(Quotes $quote)
    {
        $tags = Tags::all();
        $quote = Quotes::with(['tags'])
                ->where('idquotes',$quote->idquotes)
                ->first();

        $data_tags = [];
        foreach($quote->tags as $tag){
            $data_tags[] = $tag->idtags;
        }
        // return $tags;
        
        $contents = [
            'data_tags' => $data_tags,
            'tags' => $tags,
            'quote' => $quote,
        ];

        $pagecontent = view('quotes.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Quotes',
            'menu' => 'quotes',
            'submenu' => 'quotes',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Quotes $quote)
    {
        $request->validate([
            'tittle' => 'required',
            // 'slug' => 'required',
            'subject' => 'required',
            'status' => ''
        ]);

        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $quotesSave = Quotes::find($quote->idquotes);
        $quotesSave->tittle = $request->tittle;
        $quotesSave->slug =  $slug = Str::slug($request->tittle, '-');
        $quotesSave->subject = $request->subject;
        $quotesSave->active = $active;
        $quotesSave->save();

        // $save_image = Images

        $quotesSave->tags()->sync($request->tag);

        return redirect('quotes')->with('updated_success','Updated Quotes');
    }

    public function delete(Quotes $quote)
    {

        $deleteQuotes = Quotes::with(['tags'])
                        ->where('idquotes',$quote->idquotes)
                        ->first();
        // return $deleteQuotes; 
        $data_tag = [];                
        foreach($deleteQuotes->tags as $tag){
            $data_tag[] = $tag->idtags;
        }

        $deleteQuotes->tags()->detach($data_tag);
        $deleteQuotes->delete();
        return redirect('quotes')->with('status_success','Deleted Quotes');
    }

    public function show($slug)
    {
        // die('oke');
        $slud = Quotes::where('tittle',$slug)->first();
        return $slud;
    }

}
