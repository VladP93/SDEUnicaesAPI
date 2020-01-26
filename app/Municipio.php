<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idmunicipio
 * @property int $iddepartamento
 * @property string $municipio
 * @property Departamento $departamento
 * @property Ubicacion[] $ubicacions
 */
class Municipio extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'municipio';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idmunicipio';

    /**
     * @var array
     */
    protected $fillable = ['iddepartamento', 'municipio'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo('App\Departamento', 'iddepartamento', 'iddepartamento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ubicacions()
    {
        return $this->hasMany('App\Ubicacion', 'idmunicipio', 'idmunicipio');
    }
}
