<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idcarrera
 * @property int $idfacultad
 * @property Carrera $carrera
 * @property Facultad $facultad
 */
class CarreraFacultad extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'carrerafacultad';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carrera()
    {
        return $this->belongsTo('App\Carrera', 'idcarrera', 'idcarrera');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facultad()
    {
        return $this->belongsTo('App\Facultad', 'idfacultad', 'idfacultad');
    }
}
