<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image_url', 'country'];

    public function users()
    {
        return $this->belongsToMany(User::class, UserCity::class);
    }
}
