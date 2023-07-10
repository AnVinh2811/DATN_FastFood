<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class popup extends Model
{
    use HasFactory;
    protected $table="tbl_popup";
    protected $fillable=[
        'link','popup_name','hinh_popup','popup_status'
    ];
    protected $primaryKey='popup_id';
}
