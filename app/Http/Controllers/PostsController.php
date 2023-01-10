<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Post;

class PostsController extends Controller
{
    public function __construct(){
    $this->middleware('auth');
  }
    //
    public function index(){

        $list = User::select()
        ->join('posts','users.id','=','posts.user_id')
        ->latest('posts.created_at')
        ->get();
        return view('posts.index',['list'=>$list]);

        }

        protected function validator(array $list)
    {
        return Validator::make($list,[
            'post' => 'required|string|min:1,max:200',
        ],
        [
        'post' => '1文字以上200文字以内',

        ]);
    }


    public function create(Request $request)
    {
        $list = $request->input('newPost');
       $user_id = Auth::user() -> id;

        \DB::table('posts')->insert([
            'post' => $list,
            'user_id' => $user_id,
        ]);

        return redirect('/top');
    }

    public function updateForm($id)
    {
        $list = \DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.index', compact('post'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('/top');
    }

     public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

public function show(){
// フォローしているユーザーのidを取得
  $following_id = Auth::user()->follows()->pluck('following_id');

// フォローしているユーザーのidを元に投稿内容を取得
  $posts = Post::with('user')->whereIn('user_id', $following_id)->get();

  return view('follows.followlist', compact('posts'));
}

}
