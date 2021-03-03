<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wilayas extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wilayas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_wilaya';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'code_wilaya',
                  'nom_wilaya'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the communes for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function communes()
    {
        return $this->hasMany('App\Models\Commune','wilaya_id','id_wilaya');
    }



}
