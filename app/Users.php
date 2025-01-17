<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';

    protected $fillable = ['name', 'email', 'score'];

    protected $primaryKey = 'id';

    public $timestamps = 'true';

}
