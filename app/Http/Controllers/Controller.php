<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\Mobil;
use App\Models\Booking; 
use Illuminate\Support\Facades\Hash;
//use Auth;
use Illuminate\Support\Facades\Auth as Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewdetail($platnomor) {
        $param['arrmobil'] = Mobil::where('platnomor', '=', $platnomor)->get();
        return view('viewdetail')->with($param);
    }

    public function viewabout() {
        return view('about'); 
    }

    public function viewcontactus() {
        return view('contactus'); 
    }

    public function viewlogin() {
        $param['message'] = ""; 
        return view('login')->with($param); 
    }

    public function viewregister() {
        return view('register'); 
    }

    public function homepage(){
        $param['arrmobil'] = Mobil::get();
        return view('index')->with($param);
    }

    public function profile(){
        return view('profile');
    }

    public function adminpage(){
        $param['arrmobil'] = Mobil::get();
        return view('admin-page')->with($param);
    }

    public function bookingpage(){
        $param['arrbooking'] = Booking::get();
        $param['arruser']    = users::get();
        $param['arrmobil']   = Mobil::get();
        return view('viewbooking')->with($param);
    }

    public function login(Request $request){
        if($request->validate([
            'usernametxt' => ['required'],
            'passwordtxt' => ['required']
        ])){
            $data = [
                "username"  => $request->usernametxt, 
                "password"  => $request->passwordtxt 
            ];
            if(Auth::attempt($data)) {  // pengecekan login
                return redirect("/"); 
            }
            else {
                $param['message']   = "Login Failed"; 
                return view("login")->with($param); 
            }
        }
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
            return redirect()->route("login")->with($param); 
            //return redirect("/")->with($param);
        }
    }

    public function postprofile(Request $request){
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
        $param['message']   = "Update Profile Sukses"; 
        return redirect("profile")->with($param); 
        //return redirect("/")->with($param);
    }

    public function post_tambahmobil(Request $request){

        $despath = '';       
        if($request->hasFile('fotomobil'))
        {
            $filefoto     = $request->file('fotomobil');
            $namafilefoto = pathinfo($filefoto->getClientOriginalName(), PATHINFO_FILENAME).'.'.
                    $filefoto->getClientOriginalExtension();
            $filefoto->move($despath, $namafilefoto);   // simpan gambar ke public folder
        }
        else 
        {
            $namafilefoto = "default.jpg"; 
        }

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

    public function viewhistory() {
        //return view('viewhistory')->with($param); 
    }

    public function post_booking(Request $request){
        $platnomor      = $request->platnomor;
        $tanggalawal    = $request->tanggalawal; 
        $tanggalakhir   = $request->tanggalakhir; 

        Booking::create(
            [
                "tanggal"       =>  date("Y-m-d"),
                "username"      =>  Auth::user()->username,
                "platnomor"     =>  $platnomor, 
                "awal"          =>  $tanggalawal,
                "akhir"         =>  $tanggalakhir, 
                "status"        =>  "Aktif",
            ]
        );

        return redirect("booking"); 
    }
}




// $arr = array(['Test','Tost']);
// dd($arr);
