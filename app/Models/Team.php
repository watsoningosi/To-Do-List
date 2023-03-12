<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
      return  $this->belongsTo(User::class, 'owner_id');
    }
    
    public function member()
    {
      return $this->hasMany(Member::class,'member_id');
    }
}
