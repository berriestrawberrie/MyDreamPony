<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'qty',
        'itemid',
        'userid',

    ];
    protected $table = 'useritems';
}
