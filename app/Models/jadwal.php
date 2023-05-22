<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "user_id",
        "waktu_id",
        "jam",
        "status_perah",
        "status_pakan",
        "stok_combor"
    ];
    
    public function waktu(){
        return $this->belongsTo(waktu::class);
    }
}
