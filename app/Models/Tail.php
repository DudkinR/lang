<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tail extends Model
{
    use HasFactory;
    // table tails

    protected $table= 'tails';
    
    public function stories()
    {
        return $this->hasMany(Story::class);
    }

    public function pages()
    {
        return $this->hasMany(Pagestory::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('read');
    }
}
