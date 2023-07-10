<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table='tbl_product';
    protected $fillable=['product_name','category_id','product_desc','product_price','product_image','product_status','product_view','pro_rating_number','pro_rating','gia_km','soluong','product_sold'];
    protected $primaryKey="product_id";
    public function category(){
    	return $this->belongsTo('App\Models\category','category_id');
    }
    public function rating(){
        return $this->hasMany('App\Models\rating','product_id');
    }
    public function gallery(){
        return $this->hasMany('App\Models\pro_img','product_id','image_id');
    }
}
