@extends('layouts.practice')
@section('title','エラー')
<head>
<link rel="stylesheet" type="text/css" href="css/staff_reg.css">
</head>
@include('header')

@section('content')
<h2 class="title">エラー</h2>
<div class="complete_msg">
    <p>エラーが発生しました。<br>
    お手数ですが、操作をやり直してください。</p>
    <a href="attendanceList">勤怠管理システムトップに戻る</a>
</div>
@endsection