<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "status",
        "qty",
        "stok_id",
        "bukti"
    ];

    public function stok(){
        return $this->belongsTo(Stok::class);
    }
}
