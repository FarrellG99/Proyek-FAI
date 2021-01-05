<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Booking; 
use DateTime;

class CekAwalBooking implements Rule
{
    public $pesan = ""; 
    public $akhir = ""; 
    public $plat  = ""; 

    public function __construct($plat, $ak)
    {
        $this->plat  = $plat; 
        $this->akhir = $ak; 
    }

    public function passes($attribute, $value)
    {
        $skrg = date("Y-m-d");
        if($value <= $skrg) {
            $this->pesan = "Tanggal Awal Pemesanan Harus Lebih Besar Tanggal Hari ini"; 
            return false; 
        }
        else if($value >= $this->akhir) {
            $this->pesan = "Tanggal Awal Harus Lebih Kecil Tanggal Akhir"; 
            return false; 
        }
        else {
            $start_date     = new DateTime($value);
            $end_date       = new DateTime($this->akhir);
            $since_start    = $start_date->diff($end_date);
            $valid          = 0; 
            $tot            = $since_start->days + 1;
            $waktu1         = $value;  
            for($i = 0; $i < $tot; $i++) {
                $qry = Booking::where('platnomor', '=', $this->plat)
                            ->where('awal', '<=', $waktu1)
                            ->where('akhir', '>=', $waktu1)
                            ->get(); 
                if(count($qry) > 0) {
                    $this->pesan = "Tanggal $waktu1 telah Disewa Orang Lain"; 
                    $valid = 1; 
                }
                $waktu1 = date("l, d-m-Y", strtotime($waktu1 . '+1 day'));
            } 

            if($valid == 0) {
                return true; 
            }
            else { 
                return false; 
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->pesan;
    }
}
