@extends('layouts.practice')
@section('title','勤怠管理TOP')
<head>
<link rel="stylesheet" type="text/css" href="css/attendanceList.css">
</head>
@include('header')

@section('content')
<form action="" method="post">
    <select name="emp_name">
        @foreach ($datas as $emp)
        <option value="{{ $emp->name }}">{{ $emp->name }}</option>
        @endforeach
    </select><br>
    <select name="year">
        @for($y=2000; $y<=2019; $y++)
        <option value="{{$y}}">{{$y}}</option>
        @endfor
    </select>年
    <select name="month">
        @for($m=1; $m<=12; $m++)
        <option value="{{$m}}">{{$m}}</option>
        @endfor
    </select>月
    <input class="kintai" type="submit" value="勤怠を表示する" >
</form>
<hr size="1">
@if(isset( $emp->name ) && isset( $y ) && isset( $m ))
@else
<h2 id="select_mon" class="title">2019年10月<h2>
<table border="1">
    <tr>
        <th>日付</th><th>開始</th><th>終了</th><th>休憩</th><th>勤務時間</th><th>作業内容</th><th>編集</th>
        </tr>
    @foreach ($param as $data)
    <tr class="list">
        <th>{{ $data->date }}</th><th>{{ $data->start_time }}</th><th>{{ $data->end_time }}</th><th>{{ $data->break_time }}</th><th>8:00</th><th>{{ $data->detail }}</th><th><button value="edit">編集</button><button value="del">削除</button></th>
    </tr>
    @endforeach
    <tr class="list"><th>10/17</th><th></th><th></th><th></th><th></th><th></th><th></tr>
</table>
<button class="kintai" href="">勤怠を登録する</button>
@endif
@endsection