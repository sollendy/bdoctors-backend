<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id',
        'name_ui',
        'lastname_ui',
        'email_ui',
        'text'
    ];
    
    public function doctors()
    {
        return $this->belongsTo(Doctor::class);
    }
}
