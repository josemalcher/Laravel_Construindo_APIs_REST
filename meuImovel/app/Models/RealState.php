<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealState extends Model
{
    use HasFactory;

    protected $table = 'real_state';
    public function user()
    {
        // return $this->belongsTo(User::class, 'user_id'); // com foregin id

        return $this->belongsTo(User::class);
    }
}
