<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildpony extends Model
{
    use HasFactory;
    protected $fillable = [
        'typeName',
        'affinity',
        'sex',
        'created',
        'specialtrait',
        'eyeCol',
        'white',
        'ink',
        'mask',
        'shade',
        'accentCol',
        'accentCol2',
        'leg-sock',
        'baseCol',
        'hairCol',
        'charm',
        'intel',
        'str',
        'hp',
        'imgwhite',
        'imgink',
        'imgmask',
        'imgeye',
        'imgaccent',
        'imgaccent2',
        'imghair',
        'imgbase',
        'imgshade'

    ];
    protected $table = 'buildponys';
}
