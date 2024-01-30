<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'photo',
        'description',
        'services',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function typologies(){
        return $this->belongsToMany(Typology::class)->withTimestamps();
    }
}
