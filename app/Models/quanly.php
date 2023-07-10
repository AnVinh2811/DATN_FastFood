<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quanly extends Model
{
    use HasFactory;
    protected $table="tbl_statistical";
    protected $fillable=[
        'order_date','sales','profit','quantity','total_order'
    ];
    protected $primaryKey='id_statistical';
}
