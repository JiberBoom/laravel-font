<?php
/**
 * Created by PhpStorm.
 * User: liangzhenfeng
 * Date: 2017/8/19
 * Time: 下午3:48
 */

namespace App\Libraries;


trait EsSearchable
{

    public $searchSettings = [
        'attributesToHighlight' => [
            '*'
        ]
    ];

    public $highlight = [];
}