<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
      $user = Auth::user();
        return view('users.profile',['user' => $user]);
    }

    public function profileUpdate(Request $request, User $user){
       $user = Auth::user();
            $user->username = $request->input('username');
            $user->mail = $request->input('mail');
            $user->password = bcrypt($request->input('password'));
            $user->bio = $request->input('bio');

            $user->save();
            return redirect('/top');
    }

    public function store(Request $request){
      $img=$request->imgpath->store('public');
    }


    public function search(){
        return view('users.search');
    }

    public function index(Request $request) {
      $users = User::paginate(20);

      $search = $request -> input('search');
      $query = User::query();
      if (!empty($search)){
        $query->where('username','like','%'.$search. '%');
      }

      $user = $query->paginate(10);

      return view('users.search',compact('user','search'));
    }

}
