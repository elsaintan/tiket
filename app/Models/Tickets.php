<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function booked_tickets()
    {
        return $this->hasMany(Booked_tickets::class);
    }
}
