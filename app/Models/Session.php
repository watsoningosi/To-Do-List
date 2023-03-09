<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   public static function getPaylorde($session)
    {
        $payload = unserialize(base64_decode($session->payload));

        return $payload['channel'];
    }
}
