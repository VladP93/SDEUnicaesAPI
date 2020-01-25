<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idadjunto
 * @property string $urlarchivo
 * @property Mensaje[] $mensajes
 */
class Adjunto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'adjunto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idadjunto';

    /**
     * @var array
     */
    protected $fillable = ['urlarchivo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mensajes()
    {
        return $this->belongsToMany('App\Mensaje', 'adjuntomensaje', 'idadjunto', 'idmensaje');
    }
}
