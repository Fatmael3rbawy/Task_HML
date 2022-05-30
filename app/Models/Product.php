<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'name','price','description','image','admin_id','category_id'
    ];

    public function admin( )
    {
       return $this->belongsTo(Admin::class);
    }

    public function category( )
    {
       return $this->belongsTo(Category::class);
    }

    public function users()
    {
         return $this->belongsToMany(User::class,'product_user','user_id','product_id');
    }
}
