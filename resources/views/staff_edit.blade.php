@extends('layouts.practice')
@section('title','社員登録')
<head>
<link rel="stylesheet" type="text/css" href="css/staff_reg.css">
</head>
@include('header')

@section('content')
<h2 class="title">社員編集</h2>
<!-- エラーメッセージ -->
    @if (count($errors))
        <div id="error_msg">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<!-- エラーメッセージ -->
<form action="staff_edit_check" method="post">
{{ csrf_field() }}
    @if (!empty($getemp))
        <input type="hidden" name="id" value="{{ $getemp->id }}">
    <div>
        <label for="name">名前</label>
        <input type="text" id="name" name="name" value="{{ $getemp->name }}">
    </div>
    <div>
        <label for="mail">メールアドレス</label>
        <input type="email" id="mail" name="mail" value="{{ $getemp->mail }}">
    </div>
    <div>
        <label for="bef_pass">パスワード(変更前)</label>
        <input type="password" id="pass" name="bef_pass" value="{{ $getemp->pass }}">
    </div>
    @else
    <input type="hidden" name="id" value="{{ old('id') }}">
    <div>
        <label for="name">名前</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label for="mail">メールアドレス</label>
        <input type="email" id="mail" name="mail" value="{{ old('mail') }}">
    </div>
    <div>
        <label for="bef_pass">パスワード(変更前)</label>
        <input type="password" id="pass" name="bef_pass" value="{{ old('bef_pass') }}">
    </div>
    @endif
    <div>
        <label for="aft_pass">パスワード(変更後)</label>
        <input type="password" id="pass" name="aft_pass">
    </div>
        <input id="touroku" type="submit" value="確認する">
</form>
@endsection