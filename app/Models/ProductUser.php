<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductUser extends Pivot
{
    protected $table = 'product_user';

    protected $fillable = ['user_id' , 'product_id'];

}
