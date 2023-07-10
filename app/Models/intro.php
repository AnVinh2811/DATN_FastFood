<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intro extends Model
{
    use HasFactory;
    protected $table="tbl_intro";
    protected $fillable=[
        'intro_title',
        'intro_desc',
        'intro_content',
        'intro_image',
    ];
    protected $primaryKey="intro_id";
}
