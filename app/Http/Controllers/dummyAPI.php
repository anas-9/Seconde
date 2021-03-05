<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class dummyAPI extends Controller
{
    function getData()
    {
       return ['name'=>'Firdo','email'=>'firdo@gmail.com'];
    }

    function add(Request $request)
    {
      $user=User::create([
         'name'=> $request->name,
      ]);
         if($user)
         {
        return ['Result'=>'Your data has been saved'];
         }
         else {
             return ['Result'=>'Something went wrong'];


         }
    }
}
