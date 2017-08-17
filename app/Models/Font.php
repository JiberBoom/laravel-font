<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Font extends Model
{
    use Searchable;

    protected $fillable = [
        'name', 'font_url','size','thumb_url','preview_url','language','author','desc','tags','status','rank','is_pay','price','unique_str','md5','language_id','download'
    ];

    /**
     * 得到该模型索引的名称。
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'fonts_index';
    }

    /**
     * 字体列表
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function lists()
    {
        $lists = Font::orderBy('id','desc')

            ->select('fonts.*','b.code')

            ->leftJoin('languages as b','fonts.language_id','=','b.id')

            ->paginate(10);//分页显示

//        $this->searchable();

        return $lists;
    }

    //和语种是一对一的关系
    /*public function language()
        {
            return $this->hasOne('App\Model\Language');
        }*/

}
