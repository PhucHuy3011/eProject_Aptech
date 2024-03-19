<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model; 

class Country extends Model{
    protected $table = 'Countries';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}


?>