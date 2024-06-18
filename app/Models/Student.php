<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function score()
    {
        return $this->hasOne(Score::class);
    }

    public function ttd()
    {
        return $this->hasOne(Image::class);
    }
}
