<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        // $result = DB::select("SELECT * FROM users");
        
        // $result2 = DB::select(DB::raw("SELECT * FROM users"));

        // $result3 = User::select(DB::raw("COUNT(*) as count"))
        //             ->whereYear('created_at',date('Y'))
        //             ->first();
        // $result4 = User::select(DB::raw("Month(created_at) as month"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
        // echo $result4[10];
        // echo "<pre>";
        //  print_r($result4);
        // return $result4;
        
        $users = User::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');
        // dd($users);
        $months = User::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at',date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);

        foreach($months as $index => $month){
         $datas[$month] = $users[$index];
        //  echo $index . '<br>';
         
        }
        return view('chart',compact('datas'));
    }

    public function barChart()
    {
        $users = User::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
// dd($users);
$months = User::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');
$datas = array(0,0,0,0,0,0,0,0,0,0,0,0);

foreach($months as $index => $month){
 $datas[$month] = $users[$index];
//  echo $index . '<br>';
 
}
return view('barChart',compact('datas'));
    }
}
