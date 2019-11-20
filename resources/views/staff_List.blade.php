@extends('layouts.practice')
@section('title','勤怠管理TOP')
<head>
<link rel="stylesheet" type="text/css" href="css/attendanceList.css">
</head>
@include('header')

@section('content')
<h2 class="title">社員一覧</h2>
<table border="1">
    <tr>
        <th>No</th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th></th>
    </tr>
    @foreach ($emps as $emp)
    <tr class="list">
        <th>{{ $emp->id }}</th>
        <th>{{ $emp->name }}</th>
        <th>{{ $emp->mail }}</th>
        <th>
            <div class="tablebutton" >
                <form action="staff_edit" method="post">
                {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $emp->id }}">
                    <input type="hidden" name="name" value="{{ $emp->name }}">
                    <input type="hidden" name="mail" value="{{ $emp->mail }}">
                    <input type="hidden" name="pass" value="{{ $emp->pass }}">
                    <input type="submit" value="編集">
                </form>
            </div>
            <div class="tablebutton" >
                <form action="staff_list" method="post">
                {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $emp->id }}">
                    <input type="submit" value="削除" onclick="return confirm('{{ $emp->name }}さんを削除しますか？\n登録済みの勤怠データも削除されます。')">
                </form>
            </div>
        </th>
    </tr>
    @endforeach
</table>
<input type="button" value="社員を登録する" class="kintai" onClick="location.href='/staff_reg'">
@endsection