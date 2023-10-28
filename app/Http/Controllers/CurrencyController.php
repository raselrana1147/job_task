<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function dashboard(Request $request){

        if ($request->isMethod("post")){
            $choose_date=$request->choose_date;
            $datas=Currency::where('date',$choose_date)->get();
        }else{
            $choose_date=Carbon::now()->format('Y-m-d');
            $datas=Currency::where('date',$choose_date)->get();
        }


        return view('dashboard',compact('datas','choose_date'));
    }
}
