<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;
use App\Post;

class FollowsController extends Controller
{

    //
    public function followList(){
        //ログインユーザーがフォローしているユーザーのIDを取得
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
        $users = User::whereIn('id',$following_id)->get();
        return view('follows.followList',compact('posts','users'));
    }
    public function followerList(){
        $followed_id = Auth::user()->followers()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id', $followed_id)->get();
        $users = User::whereIn('id',$followed_id)->get();
        return view('follows.followerList',compact('posts','users'));
    }

    public function otherPost($id){
        $user = \DB::table('users')
            ->where('id', $id)
            ->get();
        $post = Post::with('user')->where('user_id', $id)->get();
        return view('users.userprofile',compact('user','post'));
    }

    //public function index(User $user)
    //{
        //$all_users = $user->getAllUsers(auth()->user()->id);

        //return view('users.index', [
            //'all_users'  => $all_users
        //]);
    //}

     public function follow($id){
         $follower = auth()->user();
         $is_following = $follower->isFollowing($id);
         if(!$is_following) {
            $follower->follow($id);
            return back();
        }
        return back();
     }

    public function unfollow($id)
    {
        $follower = auth()->user();
        $is_following = $follower->isFollowing($id);
        if($is_following) {
            $follower->unfollow($id);
            return back();
        }
        return back();
    }

}
