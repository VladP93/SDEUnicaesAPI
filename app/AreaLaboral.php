<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idArea
 * @property string $area
 */
class AreaLaboral extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'areaLaboral';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idArea';

    /**
     * @var array
     */
    protected $fillable = ['area'];

}
