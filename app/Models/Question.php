<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'test_id',
        'question_text',
        'question_number',
    ];

    public function options()
    {
        return $this->hasMany(question_options::class, 'question_id');
    }
}