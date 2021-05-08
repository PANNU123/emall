<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{




    protected $fillable = [
        'product_name', 'category_id','brand_id','product_slug','product_code','quantity',
        'sort_description','long_description','img_one','img_two','img_three','status',
    ];
}
