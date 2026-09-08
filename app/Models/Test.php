<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model  // ✅ Uppercase, extends Model not Authenticatable
{
    use HasFactory;

    protected $table = 'tests';  // Specify table name

    protected $fillable = [
        'teacher_id',    
        'title',
        'description',
        'duration_minutes',
        'total_questions',
        'marks_per_question',
        'negative_marks',
        'status',
        'start_at',
        'end_at',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    // Relationship
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
