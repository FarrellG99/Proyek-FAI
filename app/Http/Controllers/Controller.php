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
use App\Rules\CekAwalBooking; 
use Illuminate\Support\Facades\Auth as Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function viewdetail($platnomor) {
        $param['arrmobil'] = Mobil::where('platnomor', '=', $platnomor)->get();
        return view('viewdetail')->with($param);
    }

    public function nonaktifkanmobil($platnomor) {
        $data           = [
            "status"  =>  "NonAktif"
        ];
        $param['arrmobil'] = Mobil::where('platnomor', '=', $platnomor)->update($data);
        return redirect('adminmobil'); 
    }

    public function aktifkanmobil($platnomor) {
        $data           = [
            "status"  =>  "Aktif"
        ];
        $param['arrmobil'] = Mobil::where('platnomor', '=', $platnomor)->update($data);
        return redirect('adminmobil'); 
    }

    public function nonaktifkanuser($username) {
        $data           = [
            "status"  =>  "NonAktif"
        ];
        users::where('username', '=', $username)->update($data);
        return redirect('adminuser'); 
    }

    public function aktifkanuser($username) {
        $data           = [
            "status"  =>  "Aktif"
        ];
        users::where('username', '=', $username)->update($data);
        return redirect('adminuser'); 
    }

    public function viewabout() {
        return view('about'); 
    }

    public function viewcontactus() {
        return view('contactus'); 
    }

    public function logout() {
        Auth::logout(); 
        return redirect("/"); 
    }

    public function viewlogin() {
        // $data           = [
        //     "password"  =>  Hash::make("1234")
        // ];
        // users::where('username', '=', 'aaaa')->update($data); 

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

    public function password(){
        return view('password');
    }

    public function adminpage(){
        $param['arrmobil'] = Mobil::get();
        return view('admin-page')->with($param);
    }

    public function adminuser(){
        $param['arruser'] = users::get();
        return view('adminuser')->with($param);
    }

    public function bookingpage(){
        $param['arrbooking'] = Booking::get();
        $param['arruser']    = users::get();
        $param['arrmobil']   = Mobil::get();
        return view('viewbooking')->with($param);
    }

    public function adminbooking(){
        $param['arrbooking'] = Booking::get();
        $param['arruser']    = users::get();
        $param['arrmobil']   = Mobil::get();
        return view('adminbooking')->with($param);
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

                if(Auth::User()->status == "Aktif") {
                    return redirect("/"); 
                }
                else {
                    Auth::logout(); 
                    $param['message']   = "User Kena Blocked"; 
                    return view("login")->with($param);                         
                }
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
            return redirect("login")->with($param); 
            //return redirect("/")->with($param);
        }
    }

    public function postprofile(Request $request){
        $username       = $request->usernametxt;
        $name           = $request->nametxt;
        $email          = $request->emailtxt;
        $nohp           = $request->phonetxt;
        $alamat         = $request->alamattxt;
        $kota           = $request->kotatxt;
        
        $data           = [
            "name"      =>  $name,
            "email"     =>  $email, 
            "nohp"      =>  $nohp,
            "alamat"    =>  $alamat,
            "kota"      =>  $kota
        ];
        Auth::user()->update($data); 

        $param['message']   = "Update Profile Sukses"; 
        return redirect("profile")->with($param); 
        //return redirect("/")->with($param);
    }

    public function postpassword(Request $request){
        if($request->validate([
            'password1' => ['required', 'same:password2']
        ])) {
            $username       = $request->usernametxt;
            $password1      = $request->password1;
            
            $data           = [
                "password"  =>  Hash::make($password1)
            ];
            Auth::user()->update($data); 

            $param['message']   = "Change Password Sukses"; 
            return redirect("password")->with($param); 
        }
    }

    public function post_tambahmobil(Request $request){
        if($request->validate([
            'plattxt' => ['required'],
            'namamobiltxt' => ['required'],
            'warnatxt' => ['required'],
            'tahuntxt' => ['required'], 
            'hargatxt' => ['required']
        ])){
            $despath = 'mobil';       
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
            $harga          = $request->hargatxt; 

            Mobil::create(
                [
                    "platnomor"     =>  $plat, 
                    "namamobil"     =>  $namamobil,
                    "warna"         =>  $warna, 
                    "tahunmobil"    =>  $tahun,
                    "foto"          =>  $namafilefoto,
                    "status"        =>  "Ready",
                    "hargamobil"    =>  $harga,
                ]
            );
            $param['message'] = "Mobil ditambahkan !";
            $param['arrmobil'] = Mobil::get();
            return redirect("adminmobil")->with($param);
        }
    }

    public function viewhistory() {
        $param['arrbooking'] = Booking::get();
        $param['arruser']    = users::get();
        $param['arrmobil']   = Mobil::get();
        return view('viewhistory')->with($param); 
    }

    public function adminhistory() {
        $param['arrbooking'] = Booking::get();
        $param['arruser']    = users::get();
        $param['arrmobil']   = Mobil::get();
        return view('adminhistory')->with($param); 
    }

    public function post_booking(Request $request)
    {
        if($request->validate([
            'tanggalawal' => ['required', new CekAwalBooking($request->platnomor, $request->tanggalakhir)],
            'tanggalakhir' => ['required']
        ])){
            $platnomor      = $request->platnomor;
            $hargamobil     = $request->hargamobil;
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
                    "hargamobil"    =>  $hargamobil,
                ]
            );

            return redirect("booking"); 
        }
    }
}




// $arr = array(['Test','Tost']);
// dd($arr);
