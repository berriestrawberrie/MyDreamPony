<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialTrait extends Model
{
    use HasFactory;
    protected $fillable = [
        'traitname',
        'sex',
        '"icon"',
        '"genform"',
        '"8"',
        '"1"',
        '"2"',
        '"3"',
        '"4"',
        '"5"',
        '"6"',
        '"7"',
        'Unicorn',
        'Dragon',
        'Kittling',
        'Avian',
        'carry'

    ];
    protected $table = 'specialtraits';
}
