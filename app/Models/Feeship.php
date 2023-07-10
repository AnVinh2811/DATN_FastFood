<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeship extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'fee_matp', 'fee_maqh','fee_xaid','fee_feeship'
    ];
    protected $primaryKey = 'fee_id';
 	protected $table = 'tbl_feeship';

 	public function city(){
 		return $this->belongsTo('App\Models\city','fee_matp');
 	}
 	public function province(){
 		return $this->belongsTo('App\Models\province', 'fee_maqh');
 	}
 	public function wards(){
 		return $this->belongsTo('App\Models\wards','fee_xaid');
 	}
}
