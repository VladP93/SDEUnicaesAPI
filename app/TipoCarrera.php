<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idtipocarrera
 * @property string $tipocarrera
 * @property Carrera[] $carreras
 */
class TipoCarrera extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipocarrera';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idtipocarrera';

    /**
     * @var array
     */
    protected $fillable = ['tipocarrera'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carreras()
    {
        return $this->hasMany('App\Carrera', 'tipocarrera', 'idtipocarrera');
    }
}
