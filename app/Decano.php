<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $dui
 * @property int $facultad
 * @property Facultad $facultad
 */
class Decano extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'decano';

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
    protected $fillable = ['facultad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facultad()
    {
        return $this->belongsTo('App\Facultad', 'facultad', 'idfacultad');
    }
}
