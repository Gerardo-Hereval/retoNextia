<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class,'bien_id')->select(['name','username']);
    }


    protected $table='bienes';

}
