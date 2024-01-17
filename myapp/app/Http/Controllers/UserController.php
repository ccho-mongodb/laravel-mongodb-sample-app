<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function show($name)
   {
       return view('user', [
           'user' => User::where('name', '=', $name)->first()
       ]);
   }

   public function store(Request $request)
   {
       $user = new User;

       $user->name = $request->name;
       $user->email = $request->email;

       $user->save();

       return response()->json(["result" => "ok"], 201);
   }
}
