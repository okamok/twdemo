<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;

class UserController extends Controller
{
  public function index()
  {
      // $user = User::find(Auth::id());

      //① follows からログイン者のフォロー情報を取得
      $follows = Follow::where("user_id", "=" , Auth::id())->get();

      //② follow_id を配列に入れる。  [2,3]
      $followIds = []; //配列を定義する
      foreach($follows as $follow) {
        $followIds[] = $follow->follow_id;
      }

      $users = User::where("id", "!=" , Auth::id())->get();


      return view('user.list',
        [
          "users" => $users,
          "followIds" => $followIds
        ]
      );
  }

  // public function follow($follow_id) {
  public function follow(Request $request) {
    // dd($request->follow_id);
    // dd($request->followId);


    // dd(Auth::id()); // フォローする人のid
    // dd($follow_id);  //フォローされる人のid

    // followsテーブルにCreateする
    $follow = new Follow;
    $follow->user_id = Auth::id();
    $follow->follow_id = $request->followId;
    $follow->save();

    return redirect()->route('user_list');
  }

}
