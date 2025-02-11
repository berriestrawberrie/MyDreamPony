<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'itemid',
        'itemname',
        'itemtype',
        'tags',
        'info',
        'price',
        'npc',
        'resell',
        'stock',
        'image',
        'icon',
        '8',
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        'buff',
        'debuff'

    ];
    protected $table = 'items';
    public $timestamps = false;
}
