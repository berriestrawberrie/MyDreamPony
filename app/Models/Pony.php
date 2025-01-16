<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pony extends Model
{
    use HasFactory;

    protected $fillable = [
        'ponyid',
        'stable',
        'sex',
        'name',
        'image',
        'created_at',
        'updated_at',
        'typeid',
        'charm',
        'intel',
        'str',
        'hp',
        'level',
        'price',
        'faceware',
        'headware',
        'hooveware',
        'bodyware',
        'tailware',
        'legware',
        'eyeCol',
        'accentCol',
        'hairCol',
        'hairCol2',
        'baseCol',
        'accentCol2',
        'specialtrait',
        'marking',
        'hunger',
        'health',
        'exp',
        'pregnant',
        'ownerid',
        'genes',
        'lineage'

    ];
    protected $table = 'ponys';
}
