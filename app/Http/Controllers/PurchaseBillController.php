<?php

namespace App\Http\Controllers;

use App\Models\PurchaseBill;
use App\Models\PurchaseBillSlabs;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Gstr;

class PurchaseBillController extends Controller
{
    
    function purchasebillview()
    {

        $data = ['LoggedUserInfo' => Store::where('id', '=', session('LoggedUser'))->first(), 'gstslabs' => Gstr::all()];
        return view('admin.purchasebill', $data);
    }

    function addpurchasebill(Request $request)
    {
        // get all the data from $request
        $saletype = $request['saletype'];
        $stateSale = $request['stateSale'];
        $party_name = $request['partyName'];
        $gst_num = $request['gstNumber'];
        $inv_num = $request['invNumber'];
        $billDate = $request['billDate'];
        $bill_des = $request['invDes'];
        $sale_bill = 0;
        $store_code = Store::where('id','=',session('LoggedUser'))->pluck('store_code');
           
        $gst_slabs = $request->gst_slabs;
        $tax_amt = $request->tax_amt;
        $pro_unit = $request->pro_unit;
        $cgst = $request->cgst;
        $sgst = $request->sgst;
        $igst = $request->igst;

        // IMAGE FOR
        foreach($request->file('img') as $file)
        {
            $name = time().'.'.$file->getClientOriginalName();
            $file->move(public_path().'/uploads/', $name);
            $imgData[] = $name; 
        }
        // IMAGE FOR CLOSE

        // insert all the data into sale bill table 
        $saleBill = new PurchaseBill();

        $saleBill->store_code = $store_code[0];
        $saleBill->ref_invnum = 0;
        $saleBill->sale_type = $saletype;
        $saleBill->party_name = $party_name;
        $saleBill->gst_num = $gst_num;
        $saleBill->inv_num = $inv_num;
        $saleBill->bill_date = $billDate;
        $saleBill->bill_des = $bill_des;
        $saleBill->state_sale = $stateSale;


        $saleBill->bill_copy = implode(",", $imgData);

        $saleBill->save();
        $lastID = $saleBill->id;

        //   check wether the last inserted id is greater than 0
        if ($lastID > 0) {
            $FILENAME = 'SB' . str_repeat('0', (10) - strlen(rtrim($lastID))) . $lastID;

            $sale = PurchaseBill::find($lastID);
            $sale->ref_invnum = $FILENAME;
            $sale->save();
        }

        //  inserting the gst slabs inside the sale bill
        for ($count = 0; $count < count($gst_slabs); $count++) {
            $data = array(
                'inv_noref' => $FILENAME,
                'gst_slab' => $gst_slabs[$count],
                'tax_amount'  => $tax_amt[$count],
                'pro_unit'  => $pro_unit[$count],
                'pro_cgst'  => $cgst[$count],
                'pro_sgst'  => $sgst[$count],
                'pro_igst'  => $igst[$count]
            );
            $insert_data[] = $data;
        }

        PurchaseBillSlabs::insert($insert_data);
        return back()->with('success', 'Sale Bill Added Successfully');


    }

}
