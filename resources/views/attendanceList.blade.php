@extends('layouts.practice')
@section('title','勤怠管理TOP')
<head>
<link rel="stylesheet" type="text/css" href="css/attendanceList.css">
</head>
@include('header')

@section('content')
<form action="attendanceList" method="get">
   <select name="emp_name">
        @foreach ($emps as $emp)
        <option value="{{ $emp->name }}">{{ $emp->name }}</option>
        @endforeach
    </select><br>
    <select name="year">
        @for($y=2015; $y<=date('Y'); $y++)
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
@if(!empty($param['emp_name']))
<div id="pager">
    <form action="attendanceList" method="get">
        <input type="hidden" name="emp_name" value="{{$param['emp_name']}}">
        @if($param['month'] != 1)
        <input type="hidden" name="year" value="{{$param['year']}}">
        <input type="hidden" name="month" value="{{$param['month']-1}}">
        @else
        <input type="hidden" name="year" value="{{$param['year']-1}}">
        <input type="hidden" name="month" value="12">
        @endif
        <input class="button-style-link" type="submit" value="&lt;&lt;前の月" >
    </form>
    <h2 id="select_mon" class="title">{{$param['year']}}年{{$param['month']}}月</h2>
    <form action="attendanceList" method="get">
        <input type="hidden" name="emp_name" value="{{$param['emp_name']}}">
        @if($param['month'] != 12)
        <input type="hidden" name="year" value="{{$param['year']}}">
        <input type="hidden" name="month" value="{{$param['month']+1}}">
        @else
        <input type="hidden" name="year" value="{{$param['year']+1}}">
        <input type="hidden" name="month" value="1">
        @endif
        <input class="button-style-link" type="submit" value="次の月&gt;&gt;" >
    </form>
</div>
<table border="1">
    <tr>
        <th>日付</th><th>開始</th><th>終了</th><th>休憩</th><th>勤務時間</th><th>作業内容</th><th>編集</th>
        </tr>
    @foreach ($records as $record)
    <tr class="list">
        <th>{{ $record->formatted_date }}</th><th>{{ $record->start_time }}</th><th>{{ $record->end_time }}</th><th>{{ $record->break_time }}</th><th>ooo</th><th>{{ $record->detail }}</th><th><button value="edit">編集</button><button value="del">削除</button></th>
    </tr>
    @endforeach
</table>
<button class="kintai" href="">勤怠を登録する</button>
@else
@endif

    {{ print_r($records) }}
@endsection