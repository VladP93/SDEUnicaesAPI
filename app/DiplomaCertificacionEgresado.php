<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $dui
 * @property int $diplomacertificacion
 * @property string $fecha
 * @property string $foto
 * @property Egresado $egresado
 * @property Diplomacertificacion $diplomacertificacion
 */
class DiplomaCertificacionEgresado extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'diplomacertificacionegresado';

    /**
     * @var array
     */
    protected $fillable = ['dui', 'diplomacertificacion', 'fecha', 'foto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function egresado()
    {
        return $this->belongsTo('App\Egresado', 'dui', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diplomacertificacion()
    {
        return $this->belongsTo('App\Diplomacertificacion', 'diplomacertificacion', 'iddiplomadocertificacion');
    }
}
