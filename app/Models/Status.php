<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'name',
        'slug',
    ];

    public function status(){
        return $this->hasMany('App\Models\User');
    }
}
