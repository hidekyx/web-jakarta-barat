<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    public $table = "berita";
    protected $guarded = ['id'];
}
