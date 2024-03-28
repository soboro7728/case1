<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\stamps;
use App\Models\rests;
use App\Models\stampdate;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class attendanceController extends Controller
{
    //
    public function date_index()
    {
        $onestamp_dates = stamps::select('stamp_date')->distinct()->get();
        $oldstamp_table = $onestamp_dates->pluck('stamp_date');
        $stamp_table = $oldstamp_table->sort()->values()->toArray();
        rsort($stamp_table);
        $num = 0;
        $stamp_day = $stamp_table[$num];
        $stamp_dates = stamps::where('stamp_date', "$stamp_day")->paginate(5);
        return view('date', compact('stamp_dates', 'stamp_day', 'num', 'stamp_table'));
    }
    public function date_nextdate(Request $request)
    {
        // 前の番号プラス1を取得
        $oldnum = $request->num;
        $num = ++$oldnum;
        // 重複しない日付を取得
        $onestamp_dates = stamps::select('stamp_date')->distinct()->get();
        $oldstamp_table = $onestamp_dates->pluck('stamp_date');
        $stamp_table = $oldstamp_table->sort()->values()->toArray();
        rsort($stamp_table);
        $stamp_day = $stamp_table[$num];
        $stamp_dates = stamps::where('stamp_date', "$stamp_day")->paginate(1);
        return view('date', compact('stamp_dates', 'stamp_day', 'num', 'stamp_table'));
    }
    public function date_previousdate(Request $request)
    {
        // 前の番号マイナス1を取得
        $oldnum = $request->num;
        $num = --$oldnum;
        // 重複しない日付を取得
        $onestamp_dates = stamps::select('stamp_date')->distinct()->get();
        $oldstamp_table = $onestamp_dates->pluck('stamp_date');
        $stamp_table = $oldstamp_table->sort()->values()->toArray();
        rsort($stamp_table);
        $stamp_day = $stamp_table[$num];
        $stamp_dates = stamps::where('stamp_date', "$stamp_day")->paginate(5);
        return view('date', compact('stamp_dates', 'stamp_day', 'num', 'stamp_table'));
    }

    public function test()
    {
        $onestamp_dates = stamps::select('stamp_date')->distinct()->get();
        $oldstamp_table = $onestamp_dates->pluck('stamp_date');
        $stamp_table = $oldstamp_table->sort()->values()->toArray();
        rsort($stamp_table);
        $num = 0;
        $stamp_day = $stamp_table[$num];
        $stamp_dates = stamps::where('stamp_date', "$stamp_day")->paginate(5);
        return view('date', compact('stamp_dates', 'stamp_day', 'num', 'stamp_table'));

        // 降順
        // $onestamp_dates = stamps::select('stamp_date')->distinct()->get();
        // $oldstamp_table = $onestamp_dates->pluck('stamp_date');
        // $stamp_table = $oldstamp_table->sort()->values()->toArray();
        // rsort($stamp_table);
        // dd($stamp_table);
    }
}
