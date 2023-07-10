<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quangcao extends Model
{
    use HasFactory;
    protected $table="tbl_addvertised";
    protected $fillable=[
        'link','quangcao_name','hinh_quangcao','quangcao_status'
    ];
    protected $primaryKey='quangcao_id';
}
