<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    protected $fillable = [
        'name', 'font_url','size','thumb_url','preview_url','language','author','desc','tags','status','rank','is_pay','price','unique_str','md5','language_id','download'
    ];

    //和语种是一对一的关系
    /*public function language()
        {
            return $this->hasOne('App\Model\Language');
        }*/

}
