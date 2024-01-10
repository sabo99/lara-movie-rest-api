<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $guarded = [];
    protected $casts = [
        'rating'     => 'float',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function scopeSearch($query, $value)
    {
        return $query->where('title', 'like', '%' . $value . '%')
            ->orWhere('description', 'like', '%' . $value . '%')
            ->orWhere('rating', 'like', '%' . $value . '%');
    }

}
