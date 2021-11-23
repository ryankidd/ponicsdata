<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
	use HasFactory;
	protected $fillable = [
		'name',
		'description',
		'slug',
		'room_id',
	];

	public function room()
    {
        return $this->belongsTo(Room::class);
    }

	public function readings()
    {
        return $this->hasMany(Reading::class);
    }
}
