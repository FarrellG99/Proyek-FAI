<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\Mobil;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage(){
        return view('homepage');
    }

    public function adminpage(){
        $param['arrmobil'] = Mobil::get();
        return view('admin-page')->with($param);
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

    public function post_tambahmobil(Request $request){
        $plat           = $request->plattxt;
        $namamobil      = $request->namamobiltxt;
        $warna          = $request->warnatxt;
        $tahun          = $request->tahuntxt;

        Mobil::create(
            [
                "platnomor"     =>  $plat, 
                "namamobil"     =>  $namamobil,
                "warna"         =>  $warna, 
                "tahunmobil"    =>  $tahun,
                "status"        =>  "Ready",
            ]
        );
        $param['message'] = "Mobil ditambahkan !";
        $param['arrmobil'] = Mobil::get();
        return redirect("adminpage")->with($param);
    }
}




// $arr = array(['Test','Tost']);
// dd($arr);
