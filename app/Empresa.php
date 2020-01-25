<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idempresa
 * @property int $ubicacion
 * @property string $empresa
 * @property string $telefono
 * @property Ubicacion $ubicacion
 * @property Experiencialaboral[] $experiencialaborals
 */
class Empresa extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'empresa';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idempresa';

    /**
     * @var array
     */
    protected $fillable = ['ubicacion', 'empresa', 'telefono'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ubicacion()
    {
        return $this->belongsTo('App\Ubicacion', 'ubicacion', 'idubicacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiencialaborals()
    {
        return $this->hasMany('App\Experiencialaboral', 'empresa', 'idempresa');
    }
}
