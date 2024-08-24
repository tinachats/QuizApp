<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'answer', 'question_id'
    ];

    // Each answer belongs to a question
    public function question() {
        return $this->belongsTo(Question::class);
    }
}
