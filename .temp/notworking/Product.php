<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    // Using default primary key

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        
        'name',
        'details',
        'manufacturer',
        'thumbnail',
        'is_published',
        'status',

    ];
}
