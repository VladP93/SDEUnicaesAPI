<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idcargo
 * @property string $cargo
 * @property Experiencialaboral[] $experiencialaborals
 */
class Cargo extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cargo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idcargo';

    /**
     * @var array
     */
    protected $fillable = ['cargo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiencialaborals()
    {
        return $this->hasMany('App\Experiencialaboral', 'cargo', 'idcargo');
    }
}
