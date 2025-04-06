<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buildavatar extends Model
{
    //
    protected $fillable = [

        'sex',
        'race',
        'origin',
        'faction',
        'basehue',
        'extrahue',
        'ink',
        'mask',
        'base',
        'shade',
        'white',
        'extra'


    ];
    protected $primaryKey = 'avatarid';
    protected $table = 'buildavatars';
}
