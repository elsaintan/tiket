<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked_tickets extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['tickets'];
    protected $fillable = [
        'name',
        'email',
        'id_number',
        'booking_code',
        'ttl',
        'kewarganegaraan',
        'no_hp',
        'tid',
        'is_checked',
      ];

    public function tickets(){
        return $this->belongsTo(Tickets::class);
    }


}
