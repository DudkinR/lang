<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    // title anatannion lng
protected $fillable = [
        'title',
        'anatation',
        'lng',
    ];
    // bilomg to many pagestory
public function pagestory()
    {
        return $this->hasMany(Pagestory::class);
    }

}
