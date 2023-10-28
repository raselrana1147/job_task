<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function Symfony\Component\Translation\t;

class ExchangeController extends Controller
{

    public function exchange($value_id,$from,$to){

        if (!empty($value_id) || !empty($from) || !empty($to)){
            $datas=Currency::where('valuteID',$value_id)
                ->whereBetween('date',[$from,$to])
                ->get();

            $exchange_rates=CurrencyResource::collection($datas);

            return response()->json([
                'data'=>$exchange_rates,
                'status'=>Response::HTTP_OK,
            ],Response::HTTP_OK);
        }else{
            return response()->json([
                'message'=>"Information missing",
                'status'=>Response::HTTP_BAD_REQUEST,
            ],Response::HTTP_OK);
        }

    }
}
