<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idinstitucion
 * @property int $ubicacion
 * @property string $nombre
 * @property Ubicacion $ubicacion
 * @property Diplomacertificacion[] $diplomacertificacions
 */
class Institucion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'institucion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idinstitucion';

    /**
     * @var array
     */
    protected $fillable = ['ubicacion', 'nombre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ubicacion()
    {
        return $this->belongsTo('App\Ubicacion', 'ubicacion', 'idubicacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diplomacertificacions()
    {
        return $this->hasMany('App\Diplomacertificacion', 'institucion', 'idinstitucion');
    }
}
