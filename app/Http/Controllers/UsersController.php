<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }
    public function index()
    {
        $contents = [
            'users' => User::all(),
        ];

        $pagecontent = view('users.index',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Users Profile',
            'menu' => 'master',
            'submenu' => 'users',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $pagecontent = view('users.create');

        // masterpage
        $pagemain = array(
            'title' => 'Users Profile',
            'menu' => 'users',
            'submenu' => 'users',
            'pagecontent' => $pagecontent
        );

        return view('masterpage', $pagemain);
    }

}
