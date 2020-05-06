<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SondageReponse extends Model
{
    protected $guarded = [];

    /*une réponse appartient à un qsondage*/
    public function sondage()
    {
        return $this->belongsTo(Sondage::class);
    }


}
