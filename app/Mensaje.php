<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idmensaje
 * @property string $emisor
 * @property string $receptor
 * @property string $asunto
 * @property string $mensaje
 * @property Emisor $emisor
 * @property Receptor $receptor
 * @property Adjunto[] $adjuntos
 */
class Mensaje extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'mensaje';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idmensaje';

    /**
     * @var array
     */
    protected $fillable = ['emisor', 'receptor', 'asunto', 'mensaje'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function emisor()
    {
        return $this->belongsTo('App\Emisor', 'emisor', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receptor()
    {
        return $this->belongsTo('App\Receptor', 'receptor', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function adjuntos()
    {
        return $this->belongsToMany('App\Adjunto', 'adjuntomensaje', 'idmensaje', 'idadjunto');
    }
}
