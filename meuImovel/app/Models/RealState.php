<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealState extends Model
{
    use HasFactory;

    protected $table = 'real_state';

    protected $fillable = [
        'user_id', 'title', 'description', 'content', 'price',
        'slug', 'dedrooms', 'bathrooms', 'property_area', 'total_property_area'

    ];
    public function user()
    {
        // return $this->belongsTo(User::class, 'user_id'); // com foregin id

        return $this->belongsTo(User::class);
    }
}
