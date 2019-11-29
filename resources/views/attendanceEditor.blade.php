@extends('layouts.practice')
@if(empty($id))
@section('title','勤怠登録')
@else
@section('title','勤怠編集')
@endif
<head>
<link rel="stylesheet" type="text/css" href="css/attendance_editor.css">
</head>
@include('header')

@section('content')
@if(empty($id))
<h2 class="title">勤怠登録</h2>
@else
<h2 class="title">勤怠編集</h2>
@endif
<form method="post" action="complete">
{{ csrf_field() }}
    <div>
        <label for="name">名前</label>{{ $emp_name }}
    </div>
    <div>
        <label for="mail">日付</label>
        @if(isset($record))
        <input type="hidden" name="id" value="{{ $record->id }}" >
        <input type="hidden" name="employee_id" value="{{ $record->employee_id }}" >
        <input type="hidden" name="date" value="{{ $record->date }}">{{ date("Y年m月d日", strtotime($record->date))  }}
        @else
        <input type="hidden" name="employee_id" value="{{ $emp_id->id }}" >
        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">{{ date("Y年m月d日")  }}
        @endif
    </div>
    <div>
        <label for="start_time">出勤時刻</label>
        <select name="start_h">
            @for($h=0; $h<=23; $h++)
            <option value="{{$h}}">{{ $h }}</option>
            @endfor
            @if(isset($record))
            <option value="{{$record->start_hour}}" selected>{{ $record->start_hour }}</option>
            @endif
        </select>時
        @if(isset($record))
        <input type="number" class="numarea" name="start_min" value="{{$record->start_min}}">分
        @else
        <input type="number" class="numarea" name="start_min" value="">分
        @endif
    </div>
    <div>
        <label for="end_time">退勤時刻</label>
        <select name="end_h">
            @for($h=0; $h<=23; $h++)
            <option value="{{$h}}">{{ $h }}</option>
            @endfor
            @if(isset($record))
            <option value="{{$record->end_hour}}" selected>{{ $record->end_hour }}</option>
            @endif
        </select>時
        @if(isset($record))
        <input type="number" class="numarea" name="end_min" value="{{$record->end_min}}">分
        @else
        <input type="number" class="numarea" name="end_min" value="">分
        @endif
    </div>
    <div>
        <label for="break_time">休憩時間</label>
        @if(isset($record))
        <input type="number" class="numarea" name="break_time" min="0" value="{{$record->break_time}}">分
        @else
        <input type="number" class="numarea" name="break_time" min="0">分
        @endif
        </div>
    <div>
        <label for="detail">作業内容</label>
        <textarea name="detail">@if(isset($record)){{ $record->detail }}@endif</textarea>
    </div>
    <input id="touroku" type="submit" value="登録する">
</form>
@endsection