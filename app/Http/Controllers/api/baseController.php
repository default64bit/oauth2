<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;

class baseController extends Controller
{
    public function users_list(Request $request){
        $users = User::all();
        return response()->json($users);
    }

    public function edit_user(Request $request){
        $validator = Validator::make($request->toArray(),[
            'id'=>'required|numeric|exists:users',
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,id,'.$request->id,
        ]);
        if($validator->failed()){ return response()->json(['error'=>$validator->errors()],422); }
        
        $user = User::findOrFail($request->id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return response()->json(['success'=>true]);
    }

}
