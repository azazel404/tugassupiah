<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    //
    protected $table = "slideshows";

    public function content()
    {
    	return $this->belongsTo('App\Content');
    }
}
