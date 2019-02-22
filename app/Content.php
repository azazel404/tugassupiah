<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $table = "contents";
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Category')->withDefault([
            "name" => " ",
        ]);
    }

    public function categoryItem()
    {
        return $this->belongsTo('App\CategoryItem')->withDefault([
            "name" => " ",
        ]);
    }
}
