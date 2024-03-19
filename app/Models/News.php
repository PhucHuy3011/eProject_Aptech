<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model; 

class News extends Model{
    protected $table = 'News';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'date',
        'author',
        'content',
        'description',
        'picture',
        'title',
        'categoriesname',
        'countryname'
    ];
}


?>