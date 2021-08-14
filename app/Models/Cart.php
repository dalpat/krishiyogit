<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo(User::class,'vendor_id','id');
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }
}
