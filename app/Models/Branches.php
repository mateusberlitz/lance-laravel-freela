<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'name',
        'email',
        'phone',
        'state',
        'city',
        'manager',
        'address',
    ];

    public function company(){
        return $this->belongsTo(Companies::class, 'company', 'id');
    }

    public function city(){
        return $this->hasOne(Cities::class, 'id', 'city');
    }

    public function state(){
        return $this->belongsTo(States::class, 'state', 'id');
    }

    public function manager(){
        return $this->belongsTo(User::class, 'manager', 'id');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
