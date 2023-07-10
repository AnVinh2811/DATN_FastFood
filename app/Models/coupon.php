<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'coupon_name', 'coupon_code', 'coupon_time','coupon_number', 'coupon_condition','start_day','end_day','coupon_status','coupon_used'
    ];
    protected $primaryKey = 'coupon_id';
 	protected $table = 'tbl_coupon';
}
