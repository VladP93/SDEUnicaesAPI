<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idLog
 * @property string $loginfo
 * @property string $loguser
 */
class Logs extends Model
{
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idLog';

    /**
     * @var array
     */
    protected $fillable = ['loginfo', 'loguser'];

}
