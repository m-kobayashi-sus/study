@extends('layouts.practice')
@section('title','社員登録')
<head>
<link rel="stylesheet" type="text/css" href="css/staff_reg.css">
</head>
@include('header')

@section('content')
<h2 class="title">社員登録</h2>
<form action="staff_reg" method="post">
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