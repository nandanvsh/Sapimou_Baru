<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Susu extends Model
{
    use HasFactory;
    protected $fillable = [
        "volume",
        "user_id",
        "milk_at",
        "sold_at"
    ];
}
