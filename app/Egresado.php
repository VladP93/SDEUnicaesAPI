<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $dui
 * @property string $carnet
 * @property Persona $persona
 * @property Aptitud[] $aptituds
 * @property Carrera[] $carreras
 * @property Diplomacertificacionegresado[] $diplomacertificacionegresados
 * @property Experiencialaboral[] $experiencialaborals
 */
class Egresado extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'egresado';

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
    protected $fillable = ['carnet'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'dui', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function aptituds()
    {
        return $this->belongsToMany('App\Aptitud', 'aptitudegresado', 'dui', 'idaptitud');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carreras()
    {
        return $this->belongsToMany('App\Carrera', 'carreraegresado', 'dui', 'idcarrera');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diplomacertificacionegresados()
    {
        return $this->hasMany('App\Diplomacertificacionegresado', 'dui', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiencialaborals()
    {
        return $this->hasMany('App\Experiencialaboral', 'egresado', 'dui');
    }
}
