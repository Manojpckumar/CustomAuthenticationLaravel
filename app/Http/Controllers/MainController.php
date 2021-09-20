<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Gstr;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function save(Request $request)
    {
        // return $request->input();
        // validate request
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:5|max:12'
        ]);

        // insert data into db
        $store = new Store;
        $store->store_code = 0;
        $store->so_name = $request->name;
        $store->s_name = $request->name;
        $store->s_email = $request->emails;
        $store->s_phone = '9998887774';
        $store->s_address = 'test address';
        $store->s_place = 'test address';
        $store->s_gst = '32KMJLO2255LZ';
        $store->s_pan = 'KMJLO2255L';
        $store->s_username = $request->emails;
        $store->s_password = Hash::make($request->password);
        $store->s_usertype = 0;
        $store->s_userstatus = 1;
        $save = $store->save();
        $lastId = $store->id;

        if ($save) {
            $STORECODE = 'STR' . str_repeat('0', (10) - strlen(rtrim($lastId))) . $lastId;
            $store = Store::find($lastId);
            $store->store_code =  $STORECODE;
            $updated = $store->save();

            if ($updated) {
                return redirect('/')->with('success', 'Registered Successfully');
            }


            //return back()->with('success','Registered Successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    function check(Request $request)
    {
        //validate inputs 
        $request->validate([
            'useremail' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $userInfo = Store::where('s_username', '=', $request->useremail)->first();
        // return $userInfo->password;

        if (!$userInfo) {
            return back()->with('fail', 'Account not found');
        } else {
            //return $request->password;
            //return $userInfo->password;

            // check passord
            if (Hash::check($request->password, $userInfo->s_password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                //$data = ['LoggedUserInfo'=>Store::all()];
                return redirect('admin/dashboard');
            } else {
                return back()->with('fail', 'Incorrect Password');
            }
        }
    }

    function dashboard()
    {
        $data = [
            'LoggedUserInfo' => Store::where('id', '=', session('LoggedUser'))->first(),
            'storecount' => Store::all()->count(),
            'gstslabs' => Gstr::all()->count()
        ];
        return view('admin.dashboard', $data);
        //return $data;
    }

    function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }
}
