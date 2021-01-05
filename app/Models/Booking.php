<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id', 'tanggal', 'username', 'platnomor', 'awal', 'akhir', 'status'
    ];
    
    public function getall()
    {
        return Booking::get();
    }
}
