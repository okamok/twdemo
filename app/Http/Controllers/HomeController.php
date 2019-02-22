<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\Follow;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // //① follows からログイン者のフォロー情報を取得
        // $follows = Follow::where("user_id", "=" , Auth::id())->get();
        //
        // //② follow_id を配列に入れる。  [2,3]
        // $followIds = []; //配列を定義する
        // foreach($follows as $follow) {
        //   $followIds[] = $follow->follow_id;
        // }
        //
        // $followIds[] = Auth::id();

        // フォロー情報 をリレーションで取ってくるVer
        $user = User::find(Auth::id());
        $followIds = [];

        foreach ($user->follow as $follow) {
          $followIds[] = $follow->follow_id;
        }


        $followIds[] = Auth::id();


        // $tweets = Tweet::where("user_id", Auth::id())->get();
        $tweets = Tweet::whereIn("user_id", $followIds)
          ->orderBy("created_at", "desc")
          ->get();


        return view('home', ["tweets" => $tweets]);
    }
}
