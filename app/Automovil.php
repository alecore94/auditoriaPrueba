<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
class Automovil extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'automovils';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['marca', 'modelo', 'anioModelo', 'user_id'];
    protected $appends = ['users'];

    protected $auditInclude = [
        'marca', 'modelo', 'anioModelo'

    ];

    protected $auditTimestamps = true;

    protected $auditThreshold = 10;
    

    /**
    *protected $auditEvents = [
    *    'created',
    *
    *    'deleted',
    *    'restored' => 'myRestoredEventAttributes',
    *]; */ 
    

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
