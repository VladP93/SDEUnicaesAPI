<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idmensaje
 * @property int $idadjunto
 * @property Mensaje $mensaje
 * @property Adjunto $adjunto
 */
class AdjuntoMensaje extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'adjuntomensaje';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mensaje()
    {
        return $this->belongsTo('App\Mensaje', 'idmensaje', 'idmensaje');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adjunto()
    {
        return $this->belongsTo('App\Adjunto', 'idadjunto', 'idadjunto');
    }
}
