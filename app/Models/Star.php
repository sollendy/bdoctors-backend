<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote',

    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    
    }
    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'profile_star')->withTimestamps();
    }
}
