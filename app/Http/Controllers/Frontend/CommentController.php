<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Quotes;
use App\Models\User;
use App\Models\Comments;

class CommentController extends Controller
{

    public function save_comment(Request $request, $slug)
    {
        $quote_id = Quotes::where('slug',$slug)->first();
        if(!Auth::check()){
            return redirect()->back()->with('Error_Comment','You Must Login');
        }
        $save_comment = new Comments;
        $save_comment->subject = $request->subject;
        $save_comment->idquotes = $quote_id->idquotes;
        $save_comment->idusers = Auth::user()->idusers;
        $save_comment->save();

        return redirect('blog/detail/'.$slug)->with('Success_Comment','Success Comment');
    }
}
