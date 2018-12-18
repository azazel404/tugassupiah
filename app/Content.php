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
        return $this->belongsTo('App\Category');
    }

    public function categoryItem()
    {
        return $this->belongsTo('App\CategoryItem');
    }
}
