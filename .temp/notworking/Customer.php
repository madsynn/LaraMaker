<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    // Using default primary key

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        
        'name',
        'surname',

    ];
}
