<?php
namespace App;



use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;



class Price extends Model

{

    use SoftDeletes;

    

    protected $fillable = ['title', 'price', 'model', 'sku', 'quantity', 'upc', 'alt_details', 'product_id'];

    

    

    public function product()

    {

        return $this->belongsTo(\App\Product::class);

    }

    

}