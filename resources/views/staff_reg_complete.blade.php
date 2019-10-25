@extends('layouts.practice')
@section('title','登録完了')
<head>
<link rel="stylesheet" type="text/css" href="css/staff_reg.css">
</head>
@include('header')

@section('content')
<h2 class="title">登録完了</h2>
<div class="complete_msg">
    <p>社員の登録を行いました。<p>
    <a href="attendanceList">戻る</a>
</div>
@endsection