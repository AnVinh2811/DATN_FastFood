<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attribute extends Model
{
    use HasFactory;
    protected $table='product_attribute';
    protected $fillable=[
    	'attr_id',
    	'name',
    	'value',
    	
    ];
    protected $primaryKey='attr_id';
    
}
