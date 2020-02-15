<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $iddepartamento
 * @property string $departamento
 * @property Municipio[] $municipios
 */
class Departamento extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'departamento';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iddepartamento';

    /**
     * @var array
     */
    protected $fillable = ['departamento'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function municipios()
    {
        return $this->hasMany('App\Municipio', 'departamento', 'iddepartamento');
    }
}
