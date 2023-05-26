<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['name','course','email','phone'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    // public function setFilenamesAttribute($value)
    // {
    //     $this->attributes['image'] = json_encode($value);
    // }
}
