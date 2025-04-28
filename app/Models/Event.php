<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date'];

    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}

