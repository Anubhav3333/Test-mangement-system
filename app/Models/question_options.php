<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class question_options extends Model
{
    protected $table = 'question_options';

    protected $fillable = [
        'option_text',
        'option_label',
        'question_id ',
        'is_correct'

    ];
    protected $primaryKey = 'option_id';

    public function question()
    {
        return $this->belongsTo(
            Question::class,
            'id'

        );
    }
}
