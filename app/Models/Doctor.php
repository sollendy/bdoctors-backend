<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'description', 'visible', 'photo', 'services'];

    protected $with = ['typologies'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function typologies()
    {
        return $this->belongsToMany(Typology::class);
    }

    public function stars()
    {
        return $this->belongsToMany(Star::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getPhotoUri()
    {
        // dd($this->image);
        return $this->photo ? asset('storage/' . $this->photo) : "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png";
    }
}
