<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\user;

class userController extends Controller
{
      //login for superadmin, admin and staff
      function login(Request $req){
        $req->validate([
            'email' => 'required | min:5',
            'password' => 'required | min: 8'
           ]);

        $user = user::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password)){
              return view('admin/admin_login');
        }else{

                $req->session()->put('user', $user);
                return redirect('/');
                return response()->json(['success'=>'Data is successfully added']);
        
      }
    }

    
//registering users by SuperAdmin and Admin

function register(Request $req){
    $req->validate([
        'name' => 'required |min:5',
        'email' => 'required |min:7',
        'password' => 'required |min:8',
        'role' => 'required',
    ]);
    $user = new User;
    $user->name = $req->name;
    $user->email = $req->email;
    $user->role = $req->role;
    $user->password = Hash::make($req->password);
    $user->save();
    return redirect('/');
 }

}
