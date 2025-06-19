<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meme extends Model
{
    use SoftDeletes;
    protected $table = 'memes';

    protected $fillable = [
        'title',
        'url',
        'description',
        'memeImage',
    ];
}
