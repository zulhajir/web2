<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['donor_name', 'donor_email', 'amount', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
