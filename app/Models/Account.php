<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model; 

class Account extends Model{
    protected $table = 'users';

    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'age'
    ];
}

?>