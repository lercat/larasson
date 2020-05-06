<?php

namespace App;

use App\Questionnaire;
use Illuminate\Database\Eloquent\Model;

class Sondage extends Model
/*un sondage est entre le questionnaire et les entreeReponse à une réponse*/
{
    protected $guarded = [];
    /*un sondage appartient à un questionnaire*/
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /*un sondage a plusieurs reponses*/
    public function responses()
    {
        return $this->hasMany(SondageResponse::class);
    }
}
