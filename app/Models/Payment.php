<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;
    public $fillable = ['amount','client_id','agent_id'];
    public function client(){
        return $this->belongsTo(User::class,'client_id');
    }

    public function agent(){
        return $this->belongsTo(User::class,'agent_id');
    }
}
