<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Get the user that owns the phone.
     */
    protected $table = 'questions';
    protected $fillable = [
    'id',
    'question',
    'default',
    'quizz_id',
    ];
}