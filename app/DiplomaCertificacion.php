<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $iddiplomadocertificacion
 * @property int $institucion
 * @property int $arealaboral
 * @property string $nombre
 * @property string $fecha
 * @property Institucion $institucion
 * @property Arealaboral $arealaboral
 * @property Diplomacertificacionegresado[] $diplomacertificacionegresados
 */
class DiplomaCertificacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'diplomacertificacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddiplomadocertificacion';

    /**
     * @var array
     */
    protected $fillable = ['institucion', 'arealaboral', 'nombre', 'fecha'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institucion()
    {
        return $this->belongsTo('App\Institucion', 'institucion', 'idinstitucion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function arealaboral()
    {
        return $this->belongsTo('App\Arealaboral', 'arealaboral', 'idArea');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diplomacertificacionegresados()
    {
        return $this->hasMany('App\Diplomacertificacionegresado', 'diplomacertificacion', 'iddiplomadocertificacion');
    }
}
