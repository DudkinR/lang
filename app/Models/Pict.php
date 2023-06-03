<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pict extends Model
{
    use HasFactory;
    protected $table = 'pictures';
    protected $fillable = [
            'name',
            'path',
            'extension',
            'size',
            'mime_type',
            'url',
            'discription',
        ];
        // without timestamps
    public $timestamps = false;
}
