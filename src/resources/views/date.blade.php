@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}">
@endsection

@section('content')
<div class="date__content">
    勤怠データ表示処理
    <div class="date__label">
        @if(isset($stamp_table[$num-1]))
        <form class="form" action="/attendance/previousdate" method="get">
            @csrf
            <input type="hidden" name="num" value="{{ $num }}">
            <button class="date-nav__button">＜</button>
        </form>
        @else
        <button class="date-nav__button" disabled>＜</button>
        @endif
        @php
        print($stamp_day)
        @endphp
        <br>
        @if(isset($stamp_table[$num+1]))
        <form class="form" action="/attendance/nextdate" method="get">
            @csrf
            <input type="hidden" name="num" value="{{ $num }}">
            <button class="date-nav__button">＞</button>

        </form>
        @else
        <button class="date-nav__button" disabled>＞</button>
        @endif
    </div>

    <table class="table-striped">
        <thead>
            <tr>
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
                <th>日付</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stamp_dates as $stamp_date)
            <tr>
                <td>{{ $stamp_date->user->name }}</td>
                <td>{{ $stamp_date->start_work->format('H:i:s') }}</td>
                <td>{{ $stamp_date->end_work->format('H:i:s') }}</td>
                <td>{{ $stamp_date->total_rest}}</td>
                <td>{{ $stamp_date->total_work}}</td>
                <td>{{ $stamp_date->stamp_date}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $stamp_dates->appends(request()->query())->links() }}
</div>
@endsection