<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $table = 'question_options';

    protected $fillable = [
        'question_id',
        'option_label',
        'option_text',
        'is_correct',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}