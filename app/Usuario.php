<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $dui
 * @property string $usuario
 * @property string $contrasena
 * @property int $tipoUsuario
 * @property Persona $persona
 * @property Tipousuario $tipousuario
 */
class Usuario extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usuario';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'dui';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['usuario', 'contrasena', 'tipoUsuario'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'dui', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipousuario()
    {
        return $this->belongsTo('App\Tipousuario', 'tipoUsuario', 'idTipoUsuario');
    }
}
