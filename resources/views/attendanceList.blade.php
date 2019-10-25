@extends('layouts.practice')
@section('title','勤怠管理TOP')
<head>
<link rel="stylesheet" type="text/css" href="css/attendanceList.css">
</head>
@include('header')

@section('content')
<<<<<<< HEAD
<form>
=======
<form action="" method="post">
>>>>>>> 7a9e3c79cfc557102d02831e00a804ffc55eb05a
    <select name="emp_name">
        @foreach ($datas as $emp)
        <option value="{{ $emp->name }}">{{ $emp->name }}</option>
        @endforeach
    </select><br>
    <select name="year">
<<<<<<< HEAD
        @for($i=2010; $i<=2019; $i++)
        <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>年
    <select name="month">
        @for($i=1; $i<=12; $i++)
        <option value="{{$i}}">{{$i}}</option>
=======
        @for($y=2000; $y<=2019; $y++)
        <option value="{{$y}}">{{$y}}</option>
        @endfor
    </select>年
    <select name="month">
        @for($m=1; $m<=12; $m++)
        <option value="{{$m}}">{{$m}}</option>
>>>>>>> 7a9e3c79cfc557102d02831e00a804ffc55eb05a
        @endfor
    </select>月
    <input class="kintai" type="submit" value="勤怠を表示する" >
</form>
<hr size="1">
<<<<<<< HEAD
<h2 id="select_mon" class="title">2019年10月<h2>
<table border="1" style="border-collapse: collapse" align="center">
    <tr>
        <th>日付</th><th>開始</th><th>終了</th><th>休憩</th><th>勤務時間</th><th>作業内容</th><th>編集</th>
        </tr>
    <tr class="list">
        <th>10/16</th><th>9:00</th><th>18:00</th><th>1：00</th><th>8:00</th><th>実装</th><th><button value="edit">編集</button><button value="del">削除</button></th>
    </tr>
    <tr class="list"><th>10/17</th><th></th><th></th><th></th><th></th><th></th><th></tr>
</table>
<button class="kintai" href="">勤怠を登録する</button>
=======
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
>>>>>>> 7a9e3c79cfc557102d02831e00a804ffc55eb05a
@endsection