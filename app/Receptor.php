<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $dui
 * @property Persona $persona
 * @property Mensaje[] $mensajes
 */
class Receptor extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'receptor';

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
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona', 'dui', 'dui');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mensajes()
    {
        return $this->hasMany('App\Mensaje', 'receptor', 'dui');
    }
}
