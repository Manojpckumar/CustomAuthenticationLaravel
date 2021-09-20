<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    function addstore()
    {
        $data = ['LoggedUserInfo'=>Store::where('id','=',session('LoggedUser'))->first()];
        return view('admin.addstore',$data);
    }

    function createstore(Request $request)
    {
    
        // insert data into db    $2y$10$FwlCmjCUJTTCavc4CLJp9.5WCZiLmXHF7aU66rBVXhHMZNhCZj2ce
        $store = new Store;
        $store->so_name = $request->storeopName;
        $store->s_name = $request->storeName;
        $store->s_email = $request->storeEmail;
        $store->s_phone = $request->storePhone;
        $store->s_address = $request->storeAddress;
        $store->s_place = $request->storeLocation;
        $store->s_gst = $request->storeGst;
        $store->s_pan = $request->storePan;
        $store->s_username = $request->storeUsername;
        $store->s_password = Hash::make($request->storePassword);
        $store->s_usertype = 1;
        $store->s_userstatus = 1;
        $save = $store->save();
 
        if($save)
        {
            //return redirect('/admin/addstore')->with('success','Store created Successfully');
            return back()->with('success','Store created Successfully');
        }
        else{
            return back()->with('fail','Something went wrong');
        }
    }

    function managestore()
    {
        //$stores = Store::all();
        $data = ['LoggedUserInfo'=>Store::where('id','=',session('LoggedUser'))->first(),'stores'=>Store::all()];
        return view('admin.managestore',$data);
        //return $data;
    }

    function activatestore($id)
    {
        $res = Store::find($id);
        $res->s_userstatus = 1;
        $res->save();

        return back()->with('success','Store Activated Successfully');
    }


    function blockstore($id)
    {
        $res = Store::find($id);
        $res->s_userstatus = 0;
        $res->save();

        return back()->with('success','Store Blocked Successfully');
    }
    
    function removestore($id)
    {
        $store = Store::find($id);
        $store->delete();
        return back()->with('success','Store Deleted Successfully');
    }

    function editstore($id)
    {
        $data = ['LoggedUserInfo'=>Store::where('id','=',session('LoggedUser'))->first(),
                 'StoreDetails'=>Store::where('id','=',$id)->first()];
        return view('admin.editstore',$data);
        //return $data;
    }

    function updatestote(Request $request,$id)
    {
        $res = Store::find($id);
        $res->so_name = $request->input('storeopName');
        $res->s_name = $request->input('storeName');
        $res->s_email = $request->input('storeEmail');
        $res->s_phone = $request->input('storePhone');
        $res->s_address = $request->input('storeAddress');
        $res->s_place = $request->input('storeLocation');
        $res->s_gst = $request->input('storeGst');
        $res->s_pan = $request->input('storePan');
        $save = $res->save();

        // $data = ['LoggedUserInfo'=>Store::where('id','=',session('LoggedUser'))->first(),'stores'=>Store::all()];
        // return redirect('/admin/managestore',$data);
        //return back()->with('success','Store Updated Successfully');
        //return view('')->with('success','Store Deleted Successfully');

        if($save)
        {
            return redirect('/admin/managestore')->with('success','Store Updated Successfully');
        }
        else
        {

        }

        
    }
}
