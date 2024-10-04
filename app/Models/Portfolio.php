<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'short_bio', 'long_bio', 'image'];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'project_type' => 'array',
        'available_days' => 'array',
        'available_time_slots' => 'array',
    ];
    // Define a relationship to the User model (if you have one)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
