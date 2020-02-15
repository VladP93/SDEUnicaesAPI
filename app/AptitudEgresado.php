<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idaptitud
 * @property string $dui
 * @property Aptitud $aptitud
 * @property Egresado $egresado
 */
class AptitudEgresado extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'aptitudegresado';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aptitud()
    {
        return $this->belongsTo('App\Aptitud', 'idaptitud', 'idaptitud');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function egresado()
    {
        return $this->belongsTo('App\Egresado', 'dui', 'dui');
    }
}
