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
            'user' => User::all(),
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

    public function update_page(User $user)
    {
       $contents = [
           'user' => User::find($user->idusers)
       ]; 
       $pagecontent = view('users.update', $contents);

       $pagemain = array(
           'title' => 'Users Profile',
           'menu' => 'users',
           'submenu' => 'users',
           'pagecontent' => $pagecontent   
       );

       return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, User $user)
    {
        // return $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_type' => '',
        ]);

        $userSave = User::find($user->idusers);
        $userSave->name = $request->name;
        $userSave->email = $request->email;
        $userSave->role_type = $request->role_type;
        // return $userSave;
        $userSave->save();

        return redirect ('user')->with('status_success','Updated_User');
    }

}
