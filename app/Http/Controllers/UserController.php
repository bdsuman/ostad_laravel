<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request){
        $name = request()->input('name');
        $userAgent = request()->header('User-Agent');
         return $name;
        //  return response()->json(request()->all());
    }
    
    public function page(Request $request){
        
        $page = request()->query('page') ?? null;
        return $page;
        
    }

    public function response(Request $request){
        $name = request()->input('name')??'John Doe';
        $age = request()->input('age')??25;
       
        return response()->json([
            'message' => 'Success',
            'data' => [
                'name' =>$name,
                'age' => $age
            ]
        ]);
    }
    public function upload(Request $request){
        $rememberToken = request()->cookie('remember_token') ?? null;
        if ($request->hasFile('avatar')) {
            $file = request()->file('avatar');
            $file->move('uploads', $file->getClientOriginalName());
            return response()->json([
                'message' => 'Successfully File Uploaded',
            ]);
        }else{
            return response()->json([
                'message' => 'No File Selected',
            ]);
        }
        
    }
}
