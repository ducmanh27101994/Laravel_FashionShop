<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    //
    function index(){
        return view('admin.report.report');
    }

    function orderYear()
    {
        $range = \Carbon\Carbon::now()->subYears(1);
        $orderYear = DB::table('bills')
            ->select(DB::raw('year(created_at) as getYear'), DB::raw('COUNT(*) as value'))

            ->where('created_at', '>=', $range)
            ->groupBy('getYear')
            ->orderBy('getYear', 'ASC')
            ->get();

        $sumOrder = DB::table('bills')
            ->select(DB::raw('sum(totalPrice) as total'))

            ->where('created_at', '>=', $range)

            ->get();

        $sumCancel = DB::table('bills')
            ->select(DB::raw('sum(totalPrice) as sum,status'))

            ->where('created_at', '>=', $range)
            ->groupBy('status')
            ->having('status','=','Cancel')
            ->get();

        $status = DB::table('bills')
            ->select(DB::raw('count(*) as pending_count,status'))

            ->where('created_at', '>=', $range)
            ->groupBy('status')

            ->get();

        return view('admin.report.reportYear', compact('orderYear','sumOrder','status','sumCancel'));
    }

    function orderMonth()
    {
        $range = \Carbon\Carbon::now()->subMonths(1);
        $orderYear = DB::table('bills')
            ->select(DB::raw('year(created_at) as getYear'), DB::raw('COUNT(*) as value'))

            ->where('created_at', '>=', $range)
            ->groupBy('getYear')
            ->orderBy('getYear', 'ASC')
            ->get();

        $sumOrder = DB::table('bills')
            ->select(DB::raw('sum(totalPrice) as total'))

            ->where('created_at', '>=', $range)

            ->get();

        $sumCancel = DB::table('bills')
            ->select(DB::raw('sum(totalPrice) as sum,status'))

            ->where('created_at', '>=', $range)
            ->groupBy('status')
            ->having('status','=','Cancel')
            ->get();

        $status = DB::table('bills')
            ->select(DB::raw('count(*) as pending_count,status'))

            ->where('created_at', '>=', $range)
            ->groupBy('status')

            ->get();

        return view('admin.report.reportMonth', compact('orderYear','sumOrder','status','sumCancel'));
    }

    function orderWeek()
    {
        $range = \Carbon\Carbon::now()->subWeeks(1);
        $orderYear = DB::table('bills')
            ->select(DB::raw('year(created_at) as getYear'), DB::raw('COUNT(*) as value'))

            ->where('created_at', '>=', $range)
            ->groupBy('getYear')
            ->orderBy('getYear', 'ASC')
            ->get();

        $sumOrder = DB::table('bills')
            ->select(DB::raw('sum(totalPrice) as total'))

            ->where('created_at', '>=', $range)

            ->get();

        $sumCancel = DB::table('bills')
            ->select(DB::raw('sum(totalPrice) as sum,status'))

            ->where('created_at', '>=', $range)
            ->groupBy('status')
            ->having('status','=','Cancel')
            ->get();

        $status = DB::table('bills')
            ->select(DB::raw('count(*) as pending_count,status'))

            ->where('created_at', '>=', $range)
            ->groupBy('status')

            ->get();

        return view('admin.report.reportWeek', compact('orderYear','sumOrder','status','sumCancel'));
    }

    function orderDay()
    {
        $range = \Carbon\Carbon::now()->subDays(1);
        $orderYear = DB::table('bills')
            ->select(DB::raw('year(created_at) as getYear'), DB::raw('COUNT(*) as value'))

            ->where('created_at', '>=', $range)
            ->groupBy('getYear')
            ->orderBy('getYear', 'ASC')
            ->get();

        $sumOrder = DB::table('bills')
            ->select(DB::raw('sum(totalPrice) as total'))

            ->where('created_at', '>=', $range)

            ->get();

        $sumCancel = DB::table('bills')
            ->select(DB::raw('sum(totalPrice) as sum,status'))

            ->where('created_at', '>=', $range)
            ->groupBy('status')
            ->having('status','=','Cancel')
            ->get();

        $status = DB::table('bills')
            ->select(DB::raw('count(*) as pending_count,status'))

            ->where('created_at', '>=', $range)
            ->groupBy('status')

            ->get();

        return view('admin.report.reportDay', compact('orderYear','sumOrder','status','sumCancel'));
    }

    public function orderSearch(Request $request)
    {

        $orderYear = DB::table('bills')
            ->select(DB::raw('year(created_at) as getYear'), DB::raw('COUNT(*) as value'))

            ->whereBetween('created_at', [$request->day1, $request->day2])
            ->groupBy('getYear')
            ->orderBy('getYear', 'ASC')
            ->get();

        $sumOrder = DB::table('bills')
            ->select(DB::raw('sum(totalPrice) as total'))

            ->whereBetween('created_at', [$request->day1, $request->day2])

            ->get();

        $sumCancel = DB::table('bills')
            ->select(DB::raw('sum(totalPrice) as sum,status'))

            ->whereBetween('created_at', [$request->day1, $request->day2])
            ->groupBy('status')
            ->having('status','=','Cancel')
            ->get();

        $status = DB::table('bills')
            ->select(DB::raw('count(*) as pending_count,status'))

            ->whereBetween('created_at', [$request->day1, $request->day2])
            ->groupBy('status')

            ->get();

        return view('admin.report.reportSearch', compact('orderYear','sumOrder','status','sumCancel'));
    }

}
