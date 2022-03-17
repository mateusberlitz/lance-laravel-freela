<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cnpj',
        'address',
        'phone',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    // public function payments(){
    //     return $this->hasMany(Payments::class);
    // }
}
