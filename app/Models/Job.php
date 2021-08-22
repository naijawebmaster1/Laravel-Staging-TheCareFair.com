<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiver_id', 'title', 'location', 'distance', 'minimum_rate', 'maximum_rate', 'languages', 'minimum_years_of_experience', 'status', 'description',
    ];

    protected $casts = [
        'languages' => 'json',
    ];
}
