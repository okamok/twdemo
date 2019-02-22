@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(!empty($users))
            <div class="card">
                <div class="card-header">ユーザ一覧</div>

                @foreach ($users as $user)

                    <div class="card-body">
                        {{ $user->name }}

                        <div style="float:right">

<?php
  //$followIds の中に 現在行の ユーザーid（$user->id）が含まれているか確認
  // 配列に含まれているかどうかはin_arrayを使う。
?>

  @if (in_array($user->id, $followIds))
    フォロー中
  @else
    <form method="POST" action="/users/follow" accept-charset="UTF-8" id="formTweet" enctype="multipart/form-data">
      <input id="followId" name="followId" type="hidden" value="{{ $user->id }}">
      <button type="submit" class="btn btn-light">フォローする
      </button>
      @csrf
    </form>
  @endif

                        </div>
                    </div>

                    <hr>
                @endforeach

<?php
                //{{ $users->links() }}
?>

            </div>
            @endif

        </div>
    </div>
</div>
@endsection
