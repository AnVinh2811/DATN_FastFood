<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pro_img extends Model
{
    use HasFactory;
    protected $table="product_images";
    protected $fillable=[
    	'product_id','images'
    ];
    protected $primaryKey='image_id';
    
}
