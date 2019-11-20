@extends('layouts.practice')
@section('title','勤怠管理TOP')
<head>
<link rel="stylesheet" type="text/css" href="css/attendanceList.css">
</head>
@include('header')

@section('content')
<form action="attendanceList" method="get">
   <select name="emp_name">
        @if(empty($param['emp_name']))
        <option disabled selected>社員を選択</option>
        @else
        <option disabled selected>{{ ($param['emp_name']) }}</option>
        @endif
        @foreach ($emps as $emp)
        <option value="{{ $emp->name }}">{{ $emp->name }}</option>
        @endforeach
    </select><br>
    <select name="year">
        <option disabled selected>{{ ($param['year']) }}</option>
        @foreach ($years as $year)
        <option value="{{ $year->year }}">{{ $year->year }}</option>
        @endforeach
    </select>年
    <select name="month">
        <option disabled selected>{{ ($param['month']) }}</option>
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
        <th>日付</th>
        <th>開始</th>
        <th>終了</th>
        <th>休憩</th>
        <th>勤務時間</th>
        <th>作業内容</th>
        <th>編集</th>
    </tr>
    @foreach ($records as $record)
    <tr class="list">
        <th>{{ $record->formatted_date }}</th>
        <th>{{ $record->start_time }}</th>
        <th>{{ $record->end_time }}</th>
        @if ($record->break_time < 60)
        <th>{{ substr(gmdate("H:i",$record->break_time*60),1,4) }}</th>
        @else
        <th>{{ ltrim(gmdate("H:i",$record->break_time*60), '0') }}</th>
        @endif
        <th>{{ ltrim(gmdate("H:i", strtotime($record->end_time)-strtotime($record->start_time)-($record->break_time)*60), '0') }}</th>
        <th>{{ $record->detail }}</th>
        <th>
            <div class="tablebutton" >
                <form action="attendanceEditor" method="post">
                {{ csrf_field()}}
                    <input type="hidden" name="emp_name" value="{{$param['emp_name']}}">
                    <input type="hidden" name="id" value="{{ $record->id }}">
                    <input type="submit" value="編集" >
                </form>
            </div>
            <div class="tablebutton" >
                <form action="attendanceList" method="post">
                {{ csrf_field()}}
                    <input type="hidden" name="emp_name" value="{{$param['emp_name']}}">
                    <input type="hidden" name="year" value="{{$param['year']}}">
                    <input type="hidden" name="month" value="{{$param['month']}}">
                    <input type="hidden" name="attendance_id" value="{{$record->id}}">
                    <input type="submit" value="削除" onclick="return confirm('勤怠情報を削除してもよろしいですか？')">
                </form>
            </div>
        </th>
    </tr>
    @endforeach
</table>
<form action="attendanceEditor" method="post">
            {{ csrf_field()}}
    <input type="hidden" name="emp_name" value="{{$param['emp_name']}}">
    <input class="kintai" type="submit" value="勤怠を登録する" >
</form>
@else
@endif
@endsection