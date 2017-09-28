<?php

namespace App\Models;

use App\Libraries\EsSearchable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Language extends Model
{
    use Searchable;
    use EsSearchable;

    protected $fillable =[
        'code','desc','category'
    ];

   /* //与字体是一对一的关系
    public function font()
    {
        return $this->belongsTo('App\Model\Font');
    }*/
}
