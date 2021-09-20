<?php

namespace App\Http\Controllers;

use App\Models\Expences;
use Illuminate\Http\Request;
use App\Models\Store;

class ExpenceController extends Controller
{
    function recordexpence()
    {
        $data = ['LoggedUserInfo' => Store::where('id', '=', session('LoggedUser'))->first()];
        return view('admin.expences', $data);
    }


    function addexpences(Request $request)
    {
        $exp_type = $request->expences;
        $exp_desc = $request->exp_des;
        $exp_amt = $request->exp_amt;
        $exp_dates = $request->exp_dates;

        for ($count = 0; $count < count($exp_type); $count++) {
            $data = array(
                'store_code' => Store::where('id','=',session('LoggedUser'))->pluck('store_code'),
                'exp_type' => $exp_type[$count],
                'exp_des'  => $exp_desc[$count],
                'exp_amt'  => $exp_amt[$count],
                'exp_dates'  => $exp_dates[$count]
            );
            $insert_data[] = $data;
        }

        Expences::insert($insert_data);
        return back()->with('success', 'Expences Added Successfully');
    }
}
