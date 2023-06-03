<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagestory extends Model
{
    use HasFactory;
    // order text timer background
    protected $fillable = [
            'order',
            'text',
            'timer',
            'background',
            'story_id', // Add the 'story_id' to the $fillable array
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

}
