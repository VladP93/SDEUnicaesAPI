<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idTipoUsuario
 * @property string $tipoUsuario
 * @property Usuario[] $usuarios
 */
class TipoUsuario extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipousuario';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idTipoUsuario';

    /**
     * @var array
     */
    protected $fillable = ['tipoUsuario'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\Usuario', 'tipoUsuario', 'idTipoUsuario');
    }
}
