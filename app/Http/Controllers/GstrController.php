<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Gstr;
use Illuminate\Http\Request;

class GstrController extends Controller
{
    function addgstrtype()
    {
        $data = ['LoggedUserInfo'=>Store::where('id','=',session('LoggedUser'))->first()];
        return view('admin.addgstrtype',$data);
    }

    function creategstslab(Request $request)
    {
    
        // insert data into db
        $gstslab = new Gstr();
        $gstslab->gstr = $request->gstslab;
        $save = $gstslab->save();
 
        if($save)
        {
            //return redirect('/admin/addstore')->with('success','Store created Successfully');
            return back()->with('success','Store created Successfully');
        }
        else{
            return back()->with('fail','Something went wrong');
        }
    }


    function managegstslabs()
    {
        $data = ['LoggedUserInfo'=>Store::where('id','=',session('LoggedUser'))->first(),'slabs'=>Gstr::all()];
        return view('admin.manageslabs',$data);
    }

    function removeslab($id)
    {
        $gstslab = Gstr::find($id);
        $gstslab->delete();
        return back()->with('success','GST Slab Deleted Successfully');
    }
}
