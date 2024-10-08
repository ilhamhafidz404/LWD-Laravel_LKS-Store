<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // public $fillable = ["customer_id"];
    public $guarded = ["id"];

    public function User(){
        return $this->belongsTo(User::class, "customer_id");
    }
}
