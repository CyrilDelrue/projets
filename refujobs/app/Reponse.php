<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    /**
     * Get the user that owns the phone.
     */
    protected $table = 'reponses';
    protected $fillable = [
    'id',
    'reponse',
    'question_id'
    ];
}