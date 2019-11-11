@extends('layouts.practice')
@section('title','社員登録')
<head>
<link rel="stylesheet" type="text/css" href="css/staff_reg.css">
</head>
@include('header')

@section('content')
<h2 class="title">社員編集</h2>
<form method="post" action="staff_check">
{{ csrf_field() }}
    <div>
        <label for="name">名前</label>
        <input type="text" id="name" name="name" value="{{old('name')}}">
    </div>
    <div>
        <label for="mail">メールアドレス</label>
        <input type="email" id="mail" name="mail" value="{{old('mail')}}">
    </div>
    <div>
        <label for="bef_pass">パスワード(変更前)</label>
        <input type="password" id="pass" name="pass" value="{{old('bef_pass')}}">
    </div>
    <div>
        <label for="aft_pass">パスワード(変更後)</label>
        <input type="password" id="pass" name="pass" value="{{old('aft_pass')}}">
    </div>
        <input id="touroku" type="submit" value="確認する">
</form>
@endsection