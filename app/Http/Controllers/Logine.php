<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class Logine extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }
    protected function register()
    {
        return view('Auth.register');
    }
    protected function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
        $user=User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password'))
        ]);
        if($user)
        {
            return back()->with('success','You have been successfuly registered');
        }
        else
            return back()->with('fail','Something went wrong');

    }
    protected function check(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user=User::where('email','=',$request->email)->first();

        if($user)
        {
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('LoggedUser',$user->id);
                return redirect('profile');
            }
            else
            {
                return back()->with('fail','Invalid password');
            }
        }
        else
        {
            return back()->with('fail','No account found for this email');
        }
    }

    protected function profile()
    {
        if(session()->has('LoggedUser'))
        {
            $user=User::where('id','=',session('LoggedUser'))->first();
            $data=[
                'LoggedUserInfo'=>$user
            ];
        }
        else
        {
            return redirect('login')->with('fail','You must login in');
        }

return view('admin.profile',$data);
    }

    protected function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}
