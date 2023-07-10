<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_title', 'post_desc', 'post_content','post_meta_desc','post_meta_keywords','post_status','post_image','cate_post_id','post_slug','post_views'
    ];
    protected $primaryKey = 'post_id';
    protected $table = 'tbl_post';

    public function cate_post(){
        return $this->belongsTo('App\Models\CatePost','cate_post_id');
    }
}
