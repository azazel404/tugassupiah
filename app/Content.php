<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //mengambil field datai table content
    protected $table = "contents";
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
