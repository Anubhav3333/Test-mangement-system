<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestAttemptAnswer extends Model
{
    protected $table = 'attempt_answers';

    public $timestamps = false; // We manage timestamps manually

    protected $fillable = [
        'attempt_id',
        'question_id',
        'selected_option_id',
        'is_answered',
        'is_correct',
        'answered_at',
        'updated_at',
    ];

    protected $casts = [
        'is_answered' => 'boolean',
        'is_correct' => 'boolean',
        'answered_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

   
    public function attempt(): BelongsTo
    {
        return $this->belongsTo(TestAttempt::class, 'attempt_id');
    }

    /**
     * Get the question being answered
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    

    public function selectedOption(): BelongsTo
    {
        return $this->belongsTo(question_options::class, 'selected_option_id');
    }

   
    public function correctOption()
    {
        return $this->question->options()->where('is_correct', 1)->first();
    }

  
    public function isCorrect(): bool
    {
        return $this->is_correct ?? false;
    }

   
    public function isAnswered(): bool
    {
        return $this->is_answered ?? false;
    }
}
