<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;


    public function users(){
        return $this->hasOne(User::class,'base_id');
    }

    protected $table='bases';




}
