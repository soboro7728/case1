<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\stamps;
use App\Models\rests;
use Carbon\Carbon;

class TimeController extends Controller
{
    //勤怠ページ表示
    public function index()
    {
        $auths = Auth::user();
        $today = Carbon::today();
        $username = $auths->name;
        $userid = $auths->id;
        // 検索条件
        $cond = ['user_id' => $userid, 'stamp_date' => $today];
        $workdate = stamps::where($cond)->first();
        $cond2 = ['user_id' => $userid, 'stamp_date' => $today, 'rest_end' => null];
        $restdate = rests::where($cond2)->first();
        return view('index', compact('workdate', 'restdate', 'username'));
    }
    // 出勤
    public function startwork(Request $request)
    {
        $auths = Auth::user();
        $timestamp = [
            'user_id' => $auths->id,
            'start_work' => Carbon::now(),
            'stamp_date' => Carbon::today()
        ];
        stamps::create($timestamp);
        return redirect('/');
    }
    // 休憩開始
    public function startrest(Request $request)
    {
        $auths = Auth::user();
        $timestamp = [
            'user_id' => $auths->id,
            'rest_start' => Carbon::now(),
            'stamp_date' => Carbon::today()
        ];
        rests::create($timestamp);
        return redirect('/');
    }
    // 休憩終了
    public function endrest(Request $request)
    {
        $auths = Auth::user();
        $newtime = Carbon::now();
        $today = Carbon::today();
        $userid = $auths->id;
        $cond = ['user_id' => $userid, 'stamp_date' => $today, 'rest_end' => null];
        $date = rests::where($cond)->first();
        $oldtime = $date->rest_start;
        $diff = $newtime->diff($oldtime);
        $resttime = $diff->format('%H:%I:%S');
        rests::where($cond)
            ->update(['rest_end' => $newtime, 'rest_time' => $resttime]);
        return redirect('/');
    }
    // 勤務終了
    public function endwork(Request $request)
    {
        $auths = Auth::user();
        $newtime = Carbon::now();
        $today = Carbon::today();
        $userid = $auths->id;
        // 検索条件
        $cond = ['user_id' => $userid, 'stamp_date' => $today];
        $restdate = rests::where($cond)->sum("rest_time");
        $workdate = stamps::where($cond)->first();
        $oldtime = $workdate->start_work;
        $diff = $newtime->diff($oldtime);
        $restraint_work = $diff->format('%H%I%S');
        $total_work = $restraint_work - $restdate;
        stamps::where($cond)
            ->update(['end_work' => $newtime, 'total_work' => $total_work, 'total_rest' => $restdate]);
        return redirect('/');
    }

    public function test(Request $request)
    {
        $auths = Auth::user();
        $newtime = Carbon::now();
        $today = Carbon::today();
        $userid = $auths->id;
        // 検索条件
        $cond = ['user_id' => $userid, 'stamp_date' => $today];
        $workdate = stamps::where($cond)->first();
        dd($workdate);
        return view('test');
    }
}
