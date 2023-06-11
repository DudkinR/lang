<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    use HasFactory;
protected $fillable = [
		'name',
		'description',
		'url',
		'parameters',
	];
    protected $table = 'games';
    // without timestamps
    public $timestamps = false;
    public function pagestories()
    {
        return $this->belongsToMany(PageStory::class, 'game_pagestory');
    }
}
