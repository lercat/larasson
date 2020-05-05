<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function questionnaire()
    {
        return $this->beLongsTo(Questionnaire::class);
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }
}
