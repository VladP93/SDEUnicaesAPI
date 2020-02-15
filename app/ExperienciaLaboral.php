<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idexperiencia
 * @property string $egresado
 * @property int $institucion
 * @property int $cargo
 * @property int $arealaboral
 * @property string $fechainicio
 * @property string $fechafin
 * @property Egresado $egresado
 * @property Institucion $institucion
 * @property Cargo $cargo
 */
class ExperienciaLaboral extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'experiencialaboral';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idexperiencia';

    /**
     * @var array
     */
    protected $fillable = ['egresado', 'institucion', 'cargo', 'arealaboral', 'fechainicio', 'fechafin'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function egresado()
    {
        return $this->belongsTo('App\Egresado', 'egresado', 'dui');
    }

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
    public function cargo()
    {
        return $this->belongsTo('App\Cargo', 'cargo', 'idcargo');
    }
}
