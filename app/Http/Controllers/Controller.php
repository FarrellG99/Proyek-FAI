<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage(){
        return view('homepage');
    }

    public function register(Request $request){
        if($request->validate([
            'usernametxt' => ['required'],
            'nametxt' => 'required',
            'emailtxt' => ['required', 'email'],
            'phonetxt' => 'required',
            'passwordtxt' => ['required','min:4', 'same:conpasswordtxt'],
            'conpasswordtxt' => 'required',
        ])){
            $username       = $request->usernametxt;
            $name           = $request->nametxt;
            $email          = $request->emailtxt;
            $nohp           = $request->phonetxt;
            $password       = $request->passwordtxt;
            
            users::create(
                [
                    "username"  =>  $username, 
                    "name"      =>  $name,
                    "email"     =>  $email, 
                    "password"  =>  Hash::make($password),
                    "nohp"      =>  $nohp,
                    "status"    =>  "aktif",
                ]
            );
            $param['message']   = "registrasi sukses"; 
            //return redirect()->route("login")->with($param); 
            return redirect("/")->with($param);
        }
    }
}
