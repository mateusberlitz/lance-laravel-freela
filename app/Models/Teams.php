<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch',
        'company',
        'name',
        'manager',
        'desk',
    ];

    public function branch(){
        return $this->belongsTo(Branchs::class, 'branch', 'id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company', 'id');
    }

    public function desk(){
        return $this->belongsTo(Desks::class, 'desk', 'id');
    }

    public function manager(){
        return $this->belongsTo(User::class, 'manager', 'id');
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
