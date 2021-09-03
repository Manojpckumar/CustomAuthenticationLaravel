<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
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
            'name'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        // insert data into db
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->emails;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();
 
        if($save)
        {
            return redirect('/auth/login')->with('success','Registered Successfully');
            //return back()->with('success','Registered Successfully');
        }
        else{
            return back()->with('fail','Something went wrong');
        }
    }


    function check(Request $request)
    {
        //validate inputs 
        $request->validate([
            'useremail'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);


        $userInfo = Admin::where('email','=',$request->useremail)->first();
       // return $userInfo->password;

        if(!$userInfo)
        {
            return back()->with('fail','Account not found');
        }
        else
        {
            //return $request->password;
            //return $userInfo->password;

            // check passord
            if(Hash::check($request->password,Hash::make($userInfo->password)))
            {
                $request->session()->put('LoggedUser',$userInfo->id);
                return redirect('admin/dashboard');
            }
            else
            {
                return back()->with('fail','Incorrect Password');
            }
        }
    }

    function dashboard()
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.dashboard',$data);
    }

    function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }
}
  