<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idcarrera
 * @property int $tipocarrera
 * @property string $carrera
 * @property Tipocarrera $tipocarrera
 * @property Egresado[] $egresados
 * @property Facultad[] $facultads
 */
class Carrera extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'carrera';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idcarrera';

    /**
     * @var array
     */
    protected $fillable = ['tipocarrera', 'carrera'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipocarrera()
    {
        return $this->belongsTo('App\Tipocarrera', 'tipocarrera', 'idtipocarrera');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function egresados()
    {
        return $this->belongsToMany('App\Egresado', 'carreraegresado', 'idcarrera', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function facultads()
    {
        return $this->belongsToMany('App\Facultad', 'carrerafacultad', 'idcarrera', 'idfacultad');
    }
}
