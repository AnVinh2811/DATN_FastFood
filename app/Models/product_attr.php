<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_attr extends Model
{
    use HasFactory;
    protected $table="attribute";
    protected $fillable=[
        'product_id',
        'attr_id'
    ];
    protected $primaryKey='id';
    public function attribute(){
        return $this->belongsTo('App\Models\attribute','attr_id');
    }
    
}
