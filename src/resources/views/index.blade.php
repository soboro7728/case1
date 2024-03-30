@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__content">

    <div class="attendance__text">
        @if($workdate == null)
        @php
        print($username)
        @endphpさんおはようございます！
        @elseif($workdate->end_work != null)
        @php
        print($username)
        @endphpさんお疲れ様でした！
        @elseif($workdate->end_work == null)
        @php
        print($username)
        @endphpさんお疲れ様です！
        @endif
    </div>


    <div class="attendance__content">
        <div class="attendance__panel">
            <div class="attendance__work">
                <!-- 勤怠開始 -->
                @if($workdate == null)
                <form class="attendance__button" action="/work/start" method="post">
                    @csrf
                    <button class="attendance__button-submit" type="submit">勤務開始</button>
                </form>
                @else
                <form class="attendance__button" action="/work/start" method="post">
                    @csrf
                    <button class="attendance__button-submit" type="submit" disabled>勤務開始</button>
                </form>
                @endif
                <!-- 勤務終了 -->
                @if($workdate != null && $workdate->end_work == null && $restdate == null)
                <form class="attendance__button" action="/work/end" method="post">
                    @csrf
                    <button class="attendance__button-submit" type="submit">勤務終了</button>
                </form>
                @else
                <form class="attendance__button" action="/work/end" method="post">
                    @csrf
                    <button class="attendance__button-submit" type="submit" disabled>勤務終了</button>
                </form>
                @endif
            </div>
            <div class="attendance__rest">
                <!-- 休憩開始 -->
                @if($workdate != null && $restdate == null && $workdate->end_work == null)
                <form class="attendance__button" action="/work/rest/start" method="post">
                    @csrf
                    <button class="attendance__button-submit" type="submit">休憩開始</button>
                </form>
                @else
                <form class="attendance__button" action="/work/rest/start" method="post">
                    @csrf
                    <button class="attendance__button-submit" type="submit" disabled>休憩開始</button>
                </form>
                @endif
                <!-- 休憩終了 -->
                @if($workdate != null && $restdate != null)
                <form class="attendance__button" action="/work/rest/end" method="post">
                    @csrf
                    <button class="attendance__button-submit" type="submit">休憩終了</button>
                </form>
                @else
                <form class="attendance__button" action="/work/rest/end" method="post">
                    @csrf
                    <button class="attendance__button-submit" type="submit" disabled>休憩終了</button>
                </form>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection