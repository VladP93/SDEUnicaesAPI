<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idfacultad
 * @property int $idubicacion
 * @property string $facultad
 * @property Ubicacion $ubicacion
 * @property Carrera[] $carreras
 * @property Decano[] $decanos
 */
class Facultad extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'facultad';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idfacultad';

    /**
     * @var array
     */
    protected $fillable = ['idubicacion', 'facultad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ubicacion()
    {
        return $this->belongsTo('App\Ubicacion', 'idubicacion', 'idubicacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carreras()
    {
        return $this->belongsToMany('App\Carrera', 'carrerafacultad', 'idfacultad', 'idcarrera');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function decanos()
    {
        return $this->hasMany('App\Decano', 'facultad', 'idfacultad');
    }
}
