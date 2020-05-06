<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    //un questionnaire à plusieurs sondages
    public function sondages()
    {
        return $this->hasMany(Sondage::class);
    }
}
