<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chinhsach extends Model
{
    use HasFactory;
    protected $table="policy";
    protected $fillable=[
        'title',
        'image',
        'sumary',
        'content',
    ];
    protected $primaryKey='policy_id';
}
