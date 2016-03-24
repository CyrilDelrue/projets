<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    /**
     * Get the user that owns the phone.
     */
    protected $table = 'quizzs';
    protected $fillable = [
    'id',
    'Name'
    ];
}