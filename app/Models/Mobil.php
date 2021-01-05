<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobils';
    protected $primaryKey = 'platnomor';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'platnomor', 'namamobil', 'warna', 'tahunmobil', 'status', 'foto', 'hargamobil'
    ];
    
    public function getall()
    {
        return Mobil::get();
    }
}
