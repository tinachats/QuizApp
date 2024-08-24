<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question'
    ];

    // One question has many answers 
    // (One-to-many relationship)
    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
