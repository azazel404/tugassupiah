<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    //mengambil field data  dari table materies
    protected $table = "materies";

     protected $guarded = ['id'];
}
