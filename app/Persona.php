<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $dui
 * @property string $nit
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $direccion
 * @property string $correo
 * @property string $fechanacimiento
 * @property string $sexo
 * @property string $foto
 * @property Egresado $egresado
 * @property Emisor $emisor
 * @property Receptor $receptor
 * @property Usuario $usuario
 */
class Persona extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'persona';

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
    protected $fillable = ['nit', 'nombre', 'apellido', 'telefono', 'direccion', 'correo', 'fechanacimiento', 'sexo', 'foto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function egresado()
    {
        return $this->hasOne('App\Egresado', 'dui', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function emisor()
    {
        return $this->hasOne('App\Emisor', 'dui', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function receptor()
    {
        return $this->hasOne('App\Receptor', 'dui', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Usuario', 'dui', 'dui');
    }
}
