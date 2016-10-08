<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Price extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prices';

    // Using default primary key

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        
        'price_id',
        'price',
        'title',
        'model',
        'sku',
        'upc',
        'quantity',
        'alt_details',

    ];
}
