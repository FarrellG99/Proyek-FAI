<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage(){
        return view('homepage');
    }

    public function register(Request $request){
        $username       = $request->usernametxt;
        $name           = $request->nametxt;
        $email          = $request->email;
        $password       = $request->passwordtxt;
        $conpassword    = $request->conpasswordtxt;
        $nohp           = $request->phonetxt;

        $arrTest = array(
            'username'      => $username,
            'name'          => $name,
            'email'         => $email,
            'password'      => $password,
            'conpassword'   => $conpassword,
            'nohp'          => $nohp
        );
        dd($arrTest);
    }
}
