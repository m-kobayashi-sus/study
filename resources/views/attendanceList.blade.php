@extends('layouts.practice')
@section('title','勤怠管理TOP')

@include('header')

@section('content')
<form>
    <select name="emp_name">
        <option value="taro">山田 太郎</option>
        <option value="1">田中 次郎</option>
    </select><br>
    <select name="year">
        @for($i=2010; $i<=2019; $i++)
        <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>年
    <select name="month">
        @for($i=1; $i<=12; $i++)
        <option value="{{$i}}">{{$i}}</option>
        @endfor
    </select>月
    <input class="kintai" type="submit" value="勤怠を表示する" >
</form>
<hr size="1">
<h2 id="select_mon" align="center">2019年10月<h2>
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
@endsection