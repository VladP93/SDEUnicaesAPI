<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idaptitud
 * @property string $aptitud
 * @property Egresado[] $egresados
 */
class Aptitud extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'aptitud';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idaptitud';

    /**
     * @var array
     */
    protected $fillable = ['aptitud'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function egresados()
    {
        return $this->belongsToMany('App\Egresado', 'aptitudegresado', 'idaptitud', 'dui');
    }
}
