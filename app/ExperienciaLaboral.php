<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idexperiencia
 * @property string $egresado
 * @property int $empresa
 * @property int $cargo
 * @property int $arealaboral
 * @property string $fechainicio
 * @property string $fechafin
 * @property Egresado $egresado
 * @property Empresa $empresa
 * @property Cargo $cargo
 */
class ExperienciaLaboral extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'experienciaLaboral';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idexperiencia';

    /**
     * @var array
     */
    protected $fillable = ['egresado', 'empresa', 'cargo', 'arealaboral', 'fechainicio', 'fechafin'];

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
    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'empresa', 'idempresa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cargo()
    {
        return $this->belongsTo('App\Cargo', 'cargo', 'idcargo');
    }
}
