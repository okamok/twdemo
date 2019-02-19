<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;


class TweetController extends Controller
{
  public function update(Request $request) {

      $tweet = new Tweet;
      $tweet->user_id = Auth::id();
      $tweet->tweet = $request->tweet;
      $tweet->save();

      return redirect()->route('home');
  }
}
