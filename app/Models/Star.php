<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

class Star extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote',

    ];
    
    public function profiles()
    {
        return $this->belongsToMany(Profile::class)->withTimestamps();
    }
}
