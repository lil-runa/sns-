<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
      $user = Auth::user();
        return view('users.profile',['user' => $user]);
    }

    public function userProfile($id){
        $otherUser = \DB::table('users')
            ->where('id', $id)
            ->get();
        return view('users.userprofile',compact('otherUser'));
    }

    public function profileUpdate(Request $request, User $user){
       $user = Auth::user();

       $validator=Validator::make($request->all(), [
        'username' => 'required|string|min:2,max:12',
        'mail' => 'required|string|email|min:5,max:40',
        'password' => 'required|string|alpha_num|min:8,max:20|confirmed',
    ], [
        'username' => '2文字以上12文字以内',
            'mail' => '正しくありません',
            'password' => '英数字のみ　8から20字',
    ]);

            $user->username = $request->input('username');
            $user->mail = $request->input('mail');
            $user->password = bcrypt($request->input('password'));
            $user->bio = $request->input('bio');

            //$imageにrequestされたfileをいれる
            $image = $request->file('icon');
            //$imageになにか入っていればこの後の操作を実行
            if (isset($image)){
              //storeで指定の場所に画像ファイル保存
              $image_path = $image->store('public/images/');
              //basenameで画像パスを名前を付けて保存
              $user->images = basename($image_path);
            }

            if ($validator->fails()) {
    return redirect('/profile')
    ->withErrors($validator)
    ->withInput();
    } else {
            $user->save();
            return redirect('/top');
    }}



    public function search(){
        return view('users.search');
    }

    public function index(Request $request) {
      $users = User::where("id" , "!=" , Auth::user()->id)->paginate(10);


      $search = $request -> input('search');
      $query = User::query();
      if (!empty($search)){
        $query->where('username','like','%'.$search. '%');
      }

      $user = $query->paginate(10);

      return view('users.search',compact('user','search'));
    }

}
