<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idubicacion
 * @property int $idmunicipio
 * @property string $direccion
 * @property Municipio $municipio
 * @property Empresa[] $empresas
 * @property Facultad[] $facultads
 * @property Institucion[] $institucions
 */
class Ubicacion extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ubicacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idubicacion';

    /**
     * @var array
     */
    protected $fillable = ['idmunicipio', 'direccion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function municipio()
    {
        return $this->belongsTo('App\Municipio', 'idmunicipio', 'idmunicipio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empresas()
    {
        return $this->hasMany('App\Empresa', 'ubicacion', 'idubicacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facultads()
    {
        return $this->hasMany('App\Facultad', 'idubicacion', 'idubicacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function institucions()
    {
        return $this->hasMany('App\Institucion', 'ubicacion', 'idubicacion');
    }
}
