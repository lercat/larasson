<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $guarded = [];

    public function question()
    {
        return $this->beLonsTo(Question::class);
    }
}
