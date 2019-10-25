@extends('layouts.practice')
@section('title','社員登録(確認)')
<head>
<link rel="stylesheet" type="text/css" href="css/staff_reg.css">
</head>
@include('header')

@section('content')
<h2 class="title">社員登録</h2>
<!-- 確認メッセージ -->
        <div id="conf_msg">
            <ul>
                <li>登録内容を確認し、問題が無ければ「登録する」を押してください。</li>
                <li>セキュリティ上、パスワードは表示されません。</li>
            </ul>
        </div>
<!-- 確認メッセージ -->
<form action="staff_reg_complete" method="post">
{{ csrf_field() }}
    <div>
        <label for="name">名前</label>
        <b>{{$param['name']}}</b>
    </div>
    <div>
        <label for="mail">メールアドレス</label>
        <b>{{$param['mail']}}</b>
    </div>
    <div>
        <label for="pass">パスワード</label>
        <b>********</lb>
    </div>
        <input id="touroku" type="submit" value="登録する">
</form>
@endsection