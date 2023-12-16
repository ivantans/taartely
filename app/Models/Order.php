<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function isExpired(){
        $now = Carbon::now();
        return $now->diffInHours($this->created_at) > 12 && $this->status === 'accept';
    }


}
