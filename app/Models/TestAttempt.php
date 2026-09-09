<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestAttempt extends Model
{
    protected $table = 'test_attempts';
    
    public $timestamps = false;
    protected $fillable = [
        'test_id',
        'student_id',
        'started_at',
        'submitted_at',
        'expires_at',
        'status',
        'score'

    ];
    protected $casts = [
        'started_at' => 'datetime',
        'submitted_at' => 'datetime',
        'expires_at' => 'datetime',
        'score' => 'decimal:2',
    ];

    /**
     * Get the test associated with this attempt
     */

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

   
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

   
    public function answers(): HasMany
    {
        return $this->hasMany(TestAttemptAnswer::class, 'attempt_id');
    }

    
    public function correctAnswers()
    {
        return $this->answers()->where('is_correct', 1);
    }

    /**
     * Get only incorrect answers
     */
    public function incorrectAnswers()
    {
        return $this->answers()->where('is_correct', 0);
    }

    /**
     * Get only unanswered questions
     */
    public function unansweredQuestions()
    {
        return $this->answers()->where('is_answered', 0);
    }

    /**
     * Check if quiz is still active
     */
    public function isActive(): bool
    {
        return $this->status === 'IN_PROGRESS' &&
            $this->expires_at->isFuture();
    }

    /**
     * Check if time has expired
     */
    public function hasExpired(): bool
    {
        return $this->expires_at->isPast();
    }
}
