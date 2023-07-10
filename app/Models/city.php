<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name_city', 'type'
    ];
    protected $primaryKey = 'matp';
 	protected $table = 'tbl_tinhthanhpho';
}
