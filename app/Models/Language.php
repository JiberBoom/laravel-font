<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable =[
        'code','desc','category'
    ];

   /* //与字体是一对一的关系
    public function font()
    {
        return $this->belongsTo('App\Model\Font');
    }*/
}
